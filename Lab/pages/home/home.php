<div>
    <div class="centre">
        <img class="login_pageName" src="/assets/img/page_name.png"></img>
    </div>
    <h1 id="windyfeng--background">
        WINDY
        FENG
    </h1>
    <h1 id="windyfeng">
        WINDY
        FENG
    </h1>
    <div id="half_screen">.
    </div>

    <div class="wrapper">
        <div class="collapsible">
            <input type="checkbox" id="collapsible_head"></input>
            <label for="collapsible_head">AJAX - Access file story.txt</label>
            <div class="collapsible_text">
                <h2>The Hindu god Ganesha</h2>
                <button onclick={loadStory()} class="btn btn-border-pop">Load Story</button>

                <p id="collapsible_p" class="scrollable"></p>
            </div>
        </div>
    </div>

    <div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15677.758462329897!2d106.65035494971924!3d10.777602881725658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ec3c161a3fb%3A0xef77cd47a1cc691e!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIC0gxJDhuqFpIGjhu41jIFF14buRYyBnaWEgVFAuSENN!5e0!3m2!1svi!2s!4v1682616127299!5m2!1svi!2s"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div id="map"> </div>
    </div>

    <div class="background">
        <div class="square">
            <span class="title">
                QUESTION 3: sequence number
            </span>

            <div class="question3">
                <div class="res">
                    <span id="sqnum">
                    </span>
                </div>
                <button id="Show" class="btn col-sm" onclick="ShowNumber()">
                    Show Number
                </button>

                <button id="maxBtn" class="btn col-sm" onclick="ShowMaxMin(0)">
                    Max
                </button>

                <button id="minBtn" class="btn" onclick="ShowMaxMin(1)">
                    Min
                </button>
                <button id="sortMaxBtn" class="btn" onclick="SortMinMax(0)">
                    Sort Max
                </button>
                <button id="sortMinBtn" class="btn" onclick="SortMinMax()">
                    Sort min
                </button>

            </div>
        </div>
    </div>



</div>
<!-- <script>
    (g => { var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__", m = document, b = window; b = b[c] || (b[c] = {}); var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams, u = () => h || (h = new Promise(async (f, n) => { await (a = m.createElement("script")); e.set("libraries", [...r] + ""); for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]); e.set("callback", c + ".maps." + q); a.src = `https://maps.${c}apis.com/maps/api/js?` + e; d[q] = f; a.onerror = () => h = n(Error(p + " could not load.")); a.nonce = m.querySelector("script[nonce]")?.nonce || ""; m.head.append(a) })); d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n)) })({
        key: "YOUR_API_KEY_HERE",
        // Add other bootstrap parameters as needed, using camel case.
        // Use the 'v' parameter to indicate the version to load (alpha, beta, weekly, etc.)
    });
</script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDy6rNlSfwDwg7iU3TZPB6ID3um9S3xdgo&callback=initMap">
    </script> -->
<script>

    // Initialize and add the map
    // let map;

    // async function initMap() {
    //     // The location of Uluru
    //     const position = { lat: -25.344, lng: 131.031 };
    //     // Request needed libraries.
    //     //@ts-ignore
    //     const { Map } = await google.maps.importLibrary("maps");
    //     const { AdvancedMarkerView } = await google.maps.importLibrary("marker");

    //     // The map, centered at Uluru
    //     map = new Map(document.getElementById("map"), {
    //         zoom: 4,
    //         center: position,
    //         mapId: "DEMO_MAP_ID",
    //     });

    //     // The marker, positioned at Uluru
    //     const marker = new AdvancedMarkerView({
    //         map: map,
    //         position: position,
    //         title: "Uluru",
    //     });
    // }

    // initMap();


    function loadStory() {
        xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("collapsible_p").innerHTML = this.responseText;
        }
        xhttp.open("GET", "story.txt", true);
        xhttp.send();
    }

    function toggleDiv(id) {
        var x = document.getElementsByClassName("background");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function ShowNumber() {
        var sequence = [5, 25, 13, 8, 45, 6, 11]
        document.getElementById("sqnum").innerHTML = sequence
    }

    function ShowMaxMin(id) {
        var sequence = [5, 25, 13, 8, 45, 6, 11]
        var temp = sequence[0];
        sequence.forEach(e => {
            if (temp < e && id == 0) {
                temp = e;
            }
            else if (temp > e && id == 1) {
                temp = e;
            }
        })
        document.getElementById("sqnum").innerHTML = temp
    }

    function SortMinMax(typ) {
        var sequence = [5, 25, 13, 8, 45, 6, 11]
        for (var i = 0; i < sequence.length; i++) {
            for (var j = i + 1; j < sequence.length; j++) {
                if (sequence[i] > sequence[j]) {
                    var temp = sequence[i];
                    sequence[i] = sequence[j];
                    sequence[j] = temp;
                }
            }
        }

        if (typ == 1) {
            sequence = sequence.reverse()
        }

        document.getElementById("sqnum").innerHTML = sequence

    }
</script>