<?php
session_start();
require_once('connection.php');
if(!isset($_SESSION['log'])|| ($_SESSION['log'] != 'in')){
session_destroy();
header('location:not_allowed.php');
   exit();
}
if(isset($_GET['log']) && ($_GET['log']=='out')){
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$result =mysql_query("DELETE FROM logged_in_users WHERE username='".$_SESSION['SESS_USERNAME']."'");
mysql_close();
session_destroy();
header('location:main.php');
}
if(!isset($_SESSION['SESS_FIRST_NAME'])){
header('location:not_allowed_admin.php');
   exit();
}
?>
<?php
require_once('connection.php');
mysql_query("SET NAMES 'utf8'");
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
$query="SELECT * FROM test_questions";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Профил</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="WWW Icon" href="images/www_icon1.ico"/>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/protos-ui.css">
		<script src="js/jquery.2.1.1.min.js" ></script>
		<script src="js/bootstrap.min.js" ></script>
		<script src="js/jquery.protos-ui.min.js" ></script>
		
    </head>
    <body>
        <span id="testtable">
            <table id="table_test">
                <tr class="tbl_test" style="border-bottom:3px solid #0066FF; font-weight:bold">
                    <td>
                        <canvas id="questionCanvas" width="700" height="500"></canvas>
                    </td>
                </tr>
            </table>
        </span> 
    </body>
    <script language="javascript" type="text/javascript">
    var qcanvas = document.getElementById("questionCanvas");
                qcanvas.addEventListener("mousedown", mouseDown, false);
                var ctx = qcanvas.getContext("2d");
                var my_gradient = ctx.createLinearGradient(0, 0, 0, 500);
                var asn = "0";
                var cquestion = [];
                var casnwer1 = [];
                var casnwer2 = [];
                var casnwer3 = [];
                var casnwer4 = [];
                var currentQuestion = 0;
                var answerTo = [];
                var trueAnswer = [];
                var nextText = "Следващ";
                var questionCount = <?php echo $num; ?> ;
                my_gradient.addColorStop(0, "#0066FF");
                my_gradient.addColorStop(1, "#0010a2");
                ctx.fillStyle = my_gradient;
                ctx.fillRect(0, 0, 700, 500);
                ctx.fillStyle = "white";
                ctx.font = "bold 31px TimesNewRoman";
                ctx.fillText("Назад", 170, 490);
                ctx.fillText(nextText, 390, 490);
                <?php
                $i = 0;
                while ($i < $num) {
                $field1 = mysql_result($result, $i, "question");
                $field2 = mysql_result($result, $i, "answer1");
                $field3 = mysql_result($result, $i, "answer2");
                $field4 = mysql_result($result, $i, "answer3");
                $field5 = mysql_result($result, $i, "answer4");
                $field6 = mysql_result($result, $i, "true_answer");
                ?>
                var ci = <?php echo $i ?> ;
                cquestion[ci] = "<?php echo $field1 ;?>";
                casnwer1[ci] = "<?php echo $field2 ;?>";
                casnwer2[ci] = "<?php echo $field3 ;?>";
                casnwer3[ci] = "<?php echo $field4 ;?>";
                casnwer4[ci] = "<?php echo $field5 ;?>";
                trueAnswer[ci] = "<?php echo $field6 ;?>";
                answerTo[ci] = "0";
                <?php
                $i++; 
				}
        ?>
                loadQuestion();
                function fillQuestion(){
                ctx.fillStyle = "white";
                        var pieces = cquestion[currentQuestion].length / 40;
                        if (pieces == 0) pieces = 1;
                        for (var i = 0; i < pieces; i++){
                var res = cquestion[currentQuestion].substring(40 * i, 40 * (i + 1));
                        ctx.fillText(res, 35, 70 + i * 31);
                }
                ctx.fillText("A  " + casnwer1[currentQuestion], 35, 250);
                        ctx.fillText("B  " + casnwer2[currentQuestion], 35, 290);
                        ctx.fillText("C  " + casnwer3[currentQuestion], 35, 330);
                        ctx.fillText("D  " + casnwer4[currentQuestion], 35, 370);
                }
        function loadQuestion(){
                asn = answerTo[currentQuestion];
                fillQuestion();
        }

        function clearSelect(){
        ctx.clearRect(0, 0, 700, 500);
                ctx.fillStyle = my_gradient;
                ctx.fillRect(0, 0, 700, 500);
                fillQuestion();
                ctx.fillText("Назад", 170, 490);
                ctx.fillText(nextText, 390, 490);
        }
        function previousQuestion(){
        if (currentQuestion == 0) return;
                currentQuestion--;
                nextText = "Следващ";
                fillQuestion();
                asn = answerTo[currentQuestion];
                selectAsn(answerTo[currentQuestion]);
        }
        function nextQuestion(){
        answerTo[currentQuestion] = asn;
                if (currentQuestion == questionCount - 1){
        alert("finish");
                return;
        }
        currentQuestion++;
                if (currentQuestion == questionCount - 1) nextText = "Предай";
                loadQuestion();
        }
        function complete(){
        qcanvas.removeEventListener("mousedown", mouseDown);
        ctx.clearRect(0, 0, 700, 500);
        ctx.fillStyle = my_gradient;
        ctx.fillRect(0, 0, 700, 500);
        ctx.fillStyle = "white";
        ctx.fillText("Вие завършихте теста!", 175, 250);
        var correct = 0;
        for (var k = 0; k < questionCount; k++){
        if (trueAnswer[k] == answerTo[k]) correct++;
        }
		var verni = "верни";
		if (correct === 1 ) verni = "верен";
        ctx.fillText("Имате " + correct +" "+verni+" отговора.", 175, 300);
        }

        function mouseDown(event){
        position = computeCoordinates(event);
                var x = position.x;
                var y = position.y;
                if ((x > 22) && (x < 59)){
        if ((y > 230) && (y < 250)){asn = 'A'; }
        if ((y > 260) && (y < 290)){asn = 'B'; }
        if ((y > 300) && (y < 330)){asn = 'C'; }
        if ((y > 340) && (y < 372)){asn = 'D'; }
        }
        if ((x > 180) && (x < 250) && (y > 465) && (y < 493)){
        if (currentQuestion == '0'){ alert("Вие сте на първият въпрос!");
                return;
        }
        previousQuestion();
                return;
        }
        if ((x > 397) && (x < 510) && (y > 465) && (y < 493)){
        if (asn == '0'){ alert("Изберете отговор!");
                return; }
        if (currentQuestion == questionCount - 1) {
		answerTo[currentQuestion]= asn;
        complete();
                return;
        }
        nextQuestion();
        }
        selectAsn(asn);
        }
        function computeCoordinates(event) {
        var totalOffsetX = 0;
                var totalOffsetY = 0;
                var currentElement = qcanvas;
                do {
        totalOffsetX += currentElement.offsetLeft;
                totalOffsetY += currentElement.offsetTop;
        } while (currentElement = currentElement.offsetParent);
                var posx = event.pageX - totalOffsetX;
                var posy = event.pageY - totalOffsetY;
                return {
        x:posx,
                y:posy
        };
        }
        function selectAsn(Asnw) {
        var context = qcanvas.getContext('2d');
                var radius = 17;
                var x = 45;
                var y;
                clearSelect();
                if (Asnw == 'A') y = 240;
                if (Asnw == 'B') y = 280;
                if (Asnw == 'C') y = 320;
                if (Asnw == 'D') y = 360;
                context.fillStyle = my_gradient;
                context.beginPath();
                context.arc(x, y, radius, 0, Math.PI * 2, true);
                context.closePath();
                context.stroke();
        }

    </script>
</html>
