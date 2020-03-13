
        $(function () {
            showTime();
        });

            function showTime() {
                var month = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
                var currTime = new Date();
                var teks = tambahNol(currTime.getFullYear()) + "-" 
                           + month[currTime.getMonth()] + "-" 
                           + currTime.getDate()+ " " 
                           + tambahNol(currTime.getHours()) + ":" 
                           + tambahNol(currTime.getMinutes()) + ":"
                           + tambahNol(currTime.getSeconds());
                $('.time').html(teks);
                setTimeout(showTime, 1000);
            }

            function tambahNol(nilai) {
                return (parseInt(nilai) < 10 ? "0" : "") + nilai;
            }