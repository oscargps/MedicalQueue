document.getElementById('form').addEventListener('submit' ,function(e){

    let cons=document.getElementById('cons').value;
    const rol = document.getElementById('rol')
    var selected = rol.selectedIndex;
    var rol_sel= rol.options[selected].value
    console.log(rol_sel)
    e.preventDefault()
    switch(rol_sel){
        case 'orientador':
        location.href='asignar.php'
        break;
        case 'administrador':
        location.href='panel_admin.php?rol=admin';
        break;
        default:
        location.href='panel_med.php?cons='+cons+'&esp='+rol_sel;
        break;
    }
})