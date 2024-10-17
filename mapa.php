
    <div id="map"></div>

    <script>
      let map;  // Variable global para almacenar el mapa

        document.getElementById('ubicacionModal').addEventListener('shown.bs.modal', function () {
            if (!map) {  // Si el mapa no ha sido inicializado
                map = L.map('map').setView([0, 0], 2); // Inicializa el mapa con una vista genérica

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Intentar obtener la ubicación del usuario
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var userLocation = [position.coords.latitude, position.coords.longitude];

                        // Actualiza el mapa para centrarse en la ubicación del usuario
                        map.setView(userLocation, 15);

                        // Agrega un marcador en la ubicación del usuario
                        L.marker(userLocation).addTo(map)
                            .bindPopup('Mi ubicación actual')
                            .openPopup();
                    }, function () {
                        alert('No se pudo obtener tu ubicación');
                    });
                } else {
                    alert('Tu navegador no soporta geolocalización');
                }
            } else {
                map.invalidateSize();  // Refresca el tamaño del mapa en caso de que ya esté inicializado
            }
        });


    </script>
