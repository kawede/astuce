const apiKey ="pk.eyJ1Ijoia2F3ZWRlZXplY2hpZWwiLCJhIjoiY2t0ZTBuaG5xMmtzcjJvbGE4dTV3d3l1eSJ9.pttusl85oYkgnOuLMwDXSg";
const mymap = L.map('map').setView([-1.6594051821472238, 29.22404659288991], 14);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: apiKey
}).addTo(mymap);

// add marker
const marker = L.marker([-1.679899, 29.216670]).addTo(mymap);

//Add Message
let template =` <h6 style="font-family:candara; font-weight:bold;">Goma </h6>
<div style="text-align:center">
    <img width="150px" height="150px" src="AGA_.png"/>
</div> `

// Add Pop Up Message

marker.bindPopup(template).openPopup();