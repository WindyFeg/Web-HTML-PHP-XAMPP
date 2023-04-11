
<div>

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

<script type="text/javascript">
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
