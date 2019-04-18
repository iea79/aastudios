document.addEventListener('click', function(e) {
    var map = document.querySelector('#hw-map-area > ymaps')
    if(e.target.id === 'hw-map-area') {
        map.style.pointerEvents = 'all'
    } else {
        map.style.pointerEvents = 'none'
    }
})
