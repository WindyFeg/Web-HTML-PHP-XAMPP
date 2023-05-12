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

<script>

    function loadStory() {
        xhttp = new XMLHttpRequest();
        xhttp.onload = function () {
            document.getElementById("collapsible_p").innerHTML = this.responseText;
        }
        xhttp.open("GET", "/utils/story.txt", true);
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