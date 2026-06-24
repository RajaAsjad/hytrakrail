(function () {
    'use strict';

    const canvas = document.getElementById('admin-auth-canvas');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let width = 0;
    let height = 0;
    let particles = [];
    let orbs = [];
    let mouse = { x: -9999, y: -9999, active: false };
    let animationId = null;
    let tick = 0;

    const COLORS = {
        cyan: '0, 200, 255',
        navy: '0, 31, 91',
        red: '192, 57, 43',
        white: '244, 248, 255',
    };

    function rand(min, max) {
        return Math.random() * (max - min) + min;
    }

    function resize() {
        const dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = Math.floor(width * dpr);
        canvas.height = Math.floor(height * dpr);
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        initScene();
    }

    function initScene() {
        const area = width * height;
        const count = prefersReducedMotion
            ? Math.min(40, Math.floor(area / 28000))
            : Math.min(90, Math.floor(area / 14000));

        particles = Array.from({ length: count }, () => ({
            x: rand(0, width),
            y: rand(0, height),
            vx: rand(-0.35, 0.35),
            vy: rand(-0.35, 0.35),
            r: rand(1.2, 2.8),
            pulse: rand(0, Math.PI * 2),
        }));

        orbs = [
            { x: width * 0.15, y: height * 0.2, r: Math.max(width, height) * 0.35, color: COLORS.cyan, speed: 0.0004 },
            { x: width * 0.85, y: height * 0.75, r: Math.max(width, height) * 0.3, color: COLORS.red, speed: -0.0003 },
            { x: width * 0.5, y: height * 0.5, r: Math.max(width, height) * 0.45, color: COLORS.navy, speed: 0.0002 },
        ];
    }

    function drawBackground() {
        const grad = ctx.createLinearGradient(0, 0, 0, height);
        grad.addColorStop(0, '#000d2e');
        grad.addColorStop(0.45, '#00081e');
        grad.addColorStop(1, '#001240');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, width, height);
    }

    function drawGrid() {
        const spacing = 72;
        const offset = (tick * 0.15) % spacing;

        ctx.save();
        ctx.strokeStyle = `rgba(${COLORS.cyan}, 0.04)`;
        ctx.lineWidth = 1;

        for (let x = -spacing + offset; x < width + spacing; x += spacing) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, height);
            ctx.stroke();
        }

        for (let y = -spacing + offset; y < height + spacing; y += spacing) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(width, y);
            ctx.stroke();
        }

        ctx.strokeStyle = `rgba(${COLORS.cyan}, 0.08)`;
        ctx.beginPath();
        ctx.moveTo(0, height * 0.62);
        ctx.lineTo(width, height * 0.38);
        ctx.stroke();

        ctx.restore();
    }

    function drawOrbs() {
        orbs.forEach((orb, i) => {
            const driftX = Math.sin(tick * orb.speed + i) * 40;
            const driftY = Math.cos(tick * orb.speed * 1.3 + i) * 30;
            const g = ctx.createRadialGradient(
                orb.x + driftX, orb.y + driftY, 0,
                orb.x + driftX, orb.y + driftY, orb.r
            );
            g.addColorStop(0, `rgba(${orb.color}, 0.14)`);
            g.addColorStop(0.55, `rgba(${orb.color}, 0.04)`);
            g.addColorStop(1, 'rgba(0, 0, 0, 0)');
            ctx.fillStyle = g;
            ctx.fillRect(0, 0, width, height);
        });
    }

    function drawConnections() {
        const maxDist = prefersReducedMotion ? 100 : 140;
        const mouseDist = prefersReducedMotion ? 0 : 160;

        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const a = particles[i];
                const b = particles[j];
                const dx = a.x - b.x;
                const dy = a.y - b.y;
                const dist = Math.hypot(dx, dy);

                if (dist < maxDist) {
                    const alpha = (1 - dist / maxDist) * 0.22;
                    ctx.strokeStyle = `rgba(${COLORS.cyan}, ${alpha})`;
                    ctx.lineWidth = 1;
                    ctx.beginPath();
                    ctx.moveTo(a.x, a.y);
                    ctx.lineTo(b.x, b.y);
                    ctx.stroke();
                }
            }

            if (mouse.active) {
                const p = particles[i];
                const mdx = p.x - mouse.x;
                const mdy = p.y - mouse.y;
                const mdist = Math.hypot(mdx, mdy);
                if (mdist < mouseDist) {
                    const alpha = (1 - mdist / mouseDist) * 0.35;
                    ctx.strokeStyle = `rgba(${COLORS.cyan}, ${alpha})`;
                    ctx.beginPath();
                    ctx.moveTo(p.x, p.y);
                    ctx.lineTo(mouse.x, mouse.y);
                    ctx.stroke();
                }
            }
        }
    }

    function drawParticles() {
        particles.forEach((p) => {
            const glow = 0.45 + Math.sin(p.pulse + tick * 0.03) * 0.2;
            const g = ctx.createRadialGradient(p.x, p.y, 0, p.x, p.y, p.r * 4);
            g.addColorStop(0, `rgba(${COLORS.cyan}, ${glow})`);
            g.addColorStop(1, `rgba(${COLORS.cyan}, 0)`);
            ctx.fillStyle = g;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r * 4, 0, Math.PI * 2);
            ctx.fill();

            ctx.fillStyle = `rgba(${COLORS.white}, 0.85)`;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fill();
        });
    }

    function updateParticles() {
        if (prefersReducedMotion) return;

        particles.forEach((p) => {
            p.x += p.vx;
            p.y += p.vy;
            p.pulse += 0.02;

            if (p.x < -20) p.x = width + 20;
            if (p.x > width + 20) p.x = -20;
            if (p.y < -20) p.y = height + 20;
            if (p.y > height + 20) p.y = -20;
        });
    }

    function drawScanline() {
        if (prefersReducedMotion) return;
        const y = (tick * 1.2) % (height + 120) - 60;
        const grad = ctx.createLinearGradient(0, y - 40, 0, y + 40);
        grad.addColorStop(0, 'rgba(0, 200, 255, 0)');
        grad.addColorStop(0.5, 'rgba(0, 200, 255, 0.03)');
        grad.addColorStop(1, 'rgba(0, 200, 255, 0)');
        ctx.fillStyle = grad;
        ctx.fillRect(0, y - 40, width, 80);
    }

    function frame() {
        tick++;
        drawBackground();
        drawOrbs();
        drawGrid();
        updateParticles();
        drawConnections();
        drawParticles();
        drawScanline();
        animationId = requestAnimationFrame(frame);
    }

    function drawStaticFrame() {
        drawBackground();
        drawOrbs();
        drawGrid();
        drawConnections();
        drawParticles();
    }

    window.addEventListener('resize', resize);

    if (!prefersReducedMotion) {
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
            mouse.active = true;
        });
        window.addEventListener('mouseleave', () => {
            mouse.active = false;
        });
    }

    resize();

    if (prefersReducedMotion) {
        drawStaticFrame();
    } else {
        frame();
    }

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            if (animationId) cancelAnimationFrame(animationId);
            animationId = null;
        } else if (!prefersReducedMotion && !animationId) {
            frame();
        }
    });
})();
