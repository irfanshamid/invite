<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/plugin.js') }}"></script>

<script>
    function copy() {

        // Copy the text inside the text field
        navigator.clipboard.writeText($('#address').text());

        // Alert the copied text
        // alert("Copied the text: " + copyText.text);
    }

    document.onreadystatechange = function() {
        var state = document.readyState
        if (state == 'interactive') {
            document.getElementById('contentBody').style.visibility = "hidden";
        } else if (state == 'complete') {
            setTimeout(function() {
                document.getElementById('interactive');
                document.getElementById('load').style.visibility = "hidden";
                document.getElementById('contentBody').style.visibility = "visible";
            }, 1000);
        }

    }

    function show() {
        var reveal = document.querySelectorAll(".reveal");
        var reveal_top = document.querySelectorAll(".reveal_top");

        for (var i = 1; i < reveal.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveal[i].getBoundingClientRect().top;
            var e = 160;

            if (elementTop < windowHeight - e) {
                reveal[i].classList.add("active");
            } else {
                reveal[i].classList.remove("active");
            }
        }

        for (var i = 1; i < reveal_top.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveal_top[i].getBoundingClientRect().top;
            var e = 160;

            if (elementTop < windowHeight - e) {
                reveal_top[i].classList.add("active");
            } else {
                reveal_top[i].classList.remove("active");
            }
        }
    }

    window.addEventListener("scroll", show);
</script>
