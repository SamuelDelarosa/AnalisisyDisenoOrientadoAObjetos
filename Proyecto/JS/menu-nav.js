function esconderAparecer(submenu){
    if(submenu == 'submenu-libro'){
        if(document.getElementById('submenu-libro').classList.contains('esconder')){
            document.getElementById('submenu-libro').className = 'aparecer';
            document.getElementById('submenu-tt').className = 'esconder';
            document.getElementById('submenu-cd').className = 'esconder';
        }else if(document.getElementById('submenu-libro').classList.contains('aparecer')){
            document.getElementById('submenu-libro').className = 'esconder';
        }
    }else if(submenu == 'submenu-tt'){
        if(document.getElementById('submenu-tt').classList.contains('esconder')){
            document.getElementById('submenu-libro').className = 'esconder';
            document.getElementById('submenu-tt').className = 'aparecer';
            document.getElementById('submenu-cd').className = 'esconder';
        }else if(document.getElementById('submenu-tt').classList.contains('aparecer')){
            document.getElementById('submenu-tt').className = 'esconder';
        }
    }else if(submenu == 'submenu-cd'){
        if(document.getElementById('submenu-cd').classList.contains('esconder')){
            document.getElementById('submenu-libro').className = 'esconder';
            document.getElementById('submenu-tt').className = 'esconder';
            document.getElementById('submenu-cd').className = 'aparecer';
        }else if(document.getElementById('submenu-cd').classList.contains('aparecer')){
            document.getElementById('submenu-cd').className = 'esconder';
        }
    }
}

function esconderAparecerMenu(){
    if(document.getElementById('menu').classList.contains('esconder-menu')){
        document.getElementById('menu').className = 'menu';
    }else{
        document.getElementById('menu').className = 'menu esconder-menu';
        document.getElementById('submenu-libro').className = 'esconder';
        document.getElementById('submenu-tt').className = 'esconder';
        document.getElementById('submenu-cd').className = 'esconder';
    }
}