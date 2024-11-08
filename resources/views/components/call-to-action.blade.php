<div id="canvas-container">
    <canvas id="three-canvas"></canvas>
</div>

<style>
    #canvas-container {
        filter: blur(4px);
        height: calc(100vh - 80px);
        overflow: hidden;
        top: 80px !important;
    }
    #three-canvas {
        max-width: 105vw;
        min-width: 105vw;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / (window.innerHeight - 80), 0.1, 1000);
    camera.position.z = 200;

    const renderer = new THREE.WebGLRenderer({ canvas: document.getElementById('three-canvas'), antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight - 80);

    // Create 1500 cubes with random positions, rotations, sizes, and wireframe material
    const cubes = [];
    const hueShiftSpeed = 0.005; // Speed of hue oscillation

    for (let i = 0; i < 1500; i++) {
        const size = Math.random() * 10 + 5; // Random size between 5 and 15
        const geometry = new THREE.BoxGeometry(size, size, size);
        const material = new THREE.MeshBasicMaterial({ color: new THREE.Color().setHSL(Math.random(), 1, 0.5), wireframe: true });
        const cube = new THREE.Mesh(geometry, material);

        cube.position.set(
            (Math.random() - 0.5) * 400,
            (Math.random() - 0.5) * 400,
            (Math.random() - 0.5) * 400
        );

        cube.rotation.set(
            Math.random() * Math.PI,
            Math.random() * Math.PI,
            Math.random() * Math.PI
        );

        scene.add(cube);
        cubes.push({ mesh: cube, hue: Math.random() }); // Store cube and its hue
    }

    let cameraPulse = 0;

    function animate() {
        requestAnimationFrame(animate);

        // Update each cube's rotation and color hue for a dynamic effect
        const time = Date.now() * 0.001; // Time-based oscillation
        cubes.forEach(({ mesh, hue }, index) => {
            // Rotate cube
            mesh.rotation.x += 0.01;
            mesh.rotation.y += 0.01;

            // Oscillate hue for back-and-forth color change
            const oscillatingHue = (hue + Math.sin(time * hueShiftSpeed + index * 0.1) * 0.5 + 0.5) % 1;
            mesh.material.color.setHSL(oscillatingHue, 1, 0.5);
        });

        // Camera pulsing effect
        cameraPulse += 0.02;
        camera.position.z = 200 + Math.sin(cameraPulse) * 20;

        renderer.render(scene, camera);
    }

    animate();

    // Handle window resizing
    window.addEventListener('resize', () => {
        renderer.setSize(window.innerWidth, window.innerHeight - 80);
        camera.aspect = window.innerWidth / (window.innerHeight - 80);
        camera.updateProjectionMatrix();
    });
</script>
