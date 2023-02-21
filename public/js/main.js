//Initialisation
/*
const scene = new THREE.Scene()
scene.background = new THREE.Color( 0xbabadf )
const light = new THREE.AmbientLight( 0xffffff ); // soft white light
scene.add( light );

const camera = new THREE.PerspectiveCamera(75 , window.innerWidth / window.innerHeight, 0.1 , 1000);
camera.position.z = 50;

var prevt = 0;

function moveCamera(){
    const t = document.body.getBoundingClientRect().bottom;

    var h = document.documentElement, 
    b = document.body,
    st = 'scrollTop',
    sh = 'scrollHeight';

    var percent = (h[st]||b[st]) / ((h[sh]||b[sh]) - h.clientHeight) * 100
    //console.log(percent )
    camera.position.y =  percent * (meshes.length*-5 / 10 +1)
    console.log(meshes.length*-5 / 10 + 1)
    //console.log(meshes[meshes.length-1])

}

document.body.onscroll = moveCamera

const renderer = new THREE.WebGLRenderer({ 
    canvas: document.getElementById('bg') 
})
renderer.setPixelRatio(window.devicePixelRatio)
renderer.setSize( window.innerWidth, window.innerHeight)
document.body.appendChild(renderer.domElement)



class CustomSinCurve extends THREE.Curve {

    constructor( scale = 1, offsety = 0 ) {

        super();

        this.scale = scale;
        this.offsety = offsety;

    }

    getPoint( t, optionalTarget = new THREE.Vector3() ) {

        const tx = Math.cos( 2 * Math.PI * t ) ;
        const ty =  t * 5 + this.offsety;
        const tz = Math.sin( 2 * Math.PI * t );
        
        return optionalTarget.set( tx, ty, tz ).multiplyScalar( this.scale );

    }

}

let meshes = []
let meshes2 = []
for (let i = 0; i < 20; i++) {
    
    const path = new CustomSinCurve( 10, i* -5 );

    const geometry = new THREE.TubeGeometry( path, 64, 6 , 16, false );
    const material = new THREE.MeshStandardMaterial( { color: 0x111111 * i, wireframe: true } );
    const mesh = new THREE.Mesh( geometry, material );
    
    const geometry2 = new THREE.TubeGeometry( path, 64, 6, 16, false );
    const material2 = new THREE.MeshStandardMaterial( { color: 0xff00ff, wireframe: true } );
    const mesh2 = new THREE.Mesh( geometry2.rotateY(180 * (Math.PI / 180) ), material2)

    meshes[i] = mesh;
    meshes2[i] = mesh2
}


for( let i = 0; i < meshes.length; i++){
    //console.log(meshes[i].position.z)
    console.log(i*-5)
    scene.add( meshes2[i] )
    scene.add( meshes[i]  )
}
/*
const spheres = []
function addSphere(){
    let sphereGeometry = new THREE.SphereGeometry(4, 32,16);
    let sphereMaterial = new THREE.MeshStandardMaterial({color: 0x00ff00});
    let sphereMesh = new THREE.Mesh( sphereGeometry, sphereMaterial);

   

    sphereMesh.position.y = -30 * spheres.length ;
    sphereMesh.position.x = Math.sin(-1) * 20;
    sphereMesh.position.z = 20;
    spheres[spheres.length] = sphereMesh;
    scene.add( spheres[spheres.length-1] )
}*/


function animate() {
    //camera.position.y -= 1;
    requestAnimationFrame( animate );
    renderer.render( scene, camera );

}
animate();
