window.addEventListener('load', function() {
    //vind dropdown menu
    var dropdown = document.getElementById('dropdown');
    dropdown.addEventListener('change', getLiftsAndEscalators);
});

function getLiftsAndEscalators() {
    // de geselecteerde waarde van het dropdown menu
    var stationId = this.value;

    // Controleer of er een station is geselecteerd
    if (stationId !== '') {
        fetch('get_lifts_and_escalators.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'stationId=' + encodeURIComponent(stationId)
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch data');
                }
                return response.json();
            })
            .then(data => {
                displayRadios(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
}


function displayRadios(data) {
    var liftRadios = document.getElementById('lift_radios');
    liftRadios.innerHTML = '';
    var liftLabel = document.createElement('label');
    liftLabel.textContent = 'Hoeveel liften werken niet?';
    liftRadios.appendChild(liftLabel);
    liftRadios.appendChild(document.createElement('br')); // Voeg een <br> toe

    // Maak radiobuttons voor elke lift in de ontvangen data
    for (var i = 1; i <= data.lifts; i++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'lift' + i;
        radio.name = 'lift';
        radio.value = i;
        radio.className = 'comment-checkbox'; // Add class for styling
        var label = document.createElement('label');
        //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.htmlFor = 'lift' + i;
        label.innerHTML = i; // nummer is de label
        label.className = 'comment-label'; // voor styling

        liftRadios.appendChild(radio);
        liftRadios.appendChild(label);
        liftRadios.appendChild(document.createElement('br')); // Voeg een <br> toe
    }

    var escalatorRadios = document.getElementById('escalator_radios');
    escalatorRadios.innerHTML = ''; // Clear previous content
    var escalatorLabel = document.createElement('label');
    escalatorLabel.textContent = 'Hoeveel roltrappen werken niet?';
    escalatorRadios.appendChild(escalatorLabel);
    escalatorRadios.appendChild(document.createElement('br')); // Voeg een <br> toe
    // Maak radiobuttons voor elke roltrap in de ontvangen data
    for (var j = 1; j <= data.escalators; j++) {
        var radio = document.createElement('input');
        radio.type = 'radio';
        radio.id = 'escalator' + j;
        radio.name = 'escalator';
        radio.value = j;
        radio.className = 'comment-checkbox'; // Add class for styling
        var label = document.createElement('label');
        //voor gebruiksvriendelijkheid, koppelt label met radiobuttons
        label.htmlFor = 'escalator' + j;
        label.innerHTML = j; // Display the number as label
        label.className = 'comment-label'; // Add class for styling

        escalatorRadios.appendChild(radio);
        escalatorRadios.appendChild(label);
        escalatorRadios.appendChild(document.createElement('br')); // Voeg een <br> toe
    }
}
