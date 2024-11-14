
    <div id="map"></div>

    <script>
       (function() {
            let map;  // Variable local dentro de esta función

            document.getElementById('ubicacionModal').addEventListener('shown.bs.modal', function () {
                if (!map) {
                    map = L.map('map').setView([0, 0], 2);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            var usuarioLocation = [position.coords.latitude, position.coords.longitude];
                            map.setView(usuarioLocation, 15);
                            L.marker(usuarioLocation).addTo(map)
                                .bindPopup('Mi ubicación actual')
                                .openPopup();
                        }, function () {
                            alert('No se pudo obtener tu ubicación');
                        });
                    } else {
                        alert('Tu navegador no soporta geolocalización');
                    }
                } else {
                    map.invalidateSize();
                }
            });
        })();


    </script>
