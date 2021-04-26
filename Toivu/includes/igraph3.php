<?php
    //Graafin tulostus sivulle
    echo "<div class=\"twelve columns\">";
        echo "<h2 class=\"text-center\">Levollisuusanalyysi</h2>";
        echo "Analysoimme sinun levollisuutta ja palautumista kahdella eri tavalla ja pyrimme antamaan niiden yhdistelmällä mahdollisimman tarkan kuvan voinnistasi. Readiness arvioi leposykevälien vaihtelua kokonaisuudessaan ja pNN50 arvioi peräkkäisiä yli 50 millisekunnin vaihteluita mittauksissasi.";
        echo "<div id=\"graph3\"></div>";
    echo "</div>";
?>

<script>
    //Datan haku APIsta
    //fetch('https://users.metropolia.fi/~ronihei/WSK12021/ToivuApp/Toivu/API/graph3API.php')
    fetch('https://users.metropolia.fi/~aapokok/WSK12021/Toivu/API/graph3API.php')
    
    .then((response) => {
        return response.json();
    })
    .then((data) => {   
    
    //Graafin javascript
    am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    am4core.useTheme(ToivuTheme);
    // Themes end

    // Create chart instance
    var chart = am4core.create("graph3", am4charts.XYChart);

    // Increase contrast by taking evey second color
    chart.colors.step = 2;

    // Add data
    chart.data = data;

    // Create axes
    var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
    dateAxis.renderer.minGridDistance = 120;

    // Create series
    function createAxisAndSeries(field, name, opposite, bullet) {
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    if(chart.yAxes.indexOf(valueAxis) != 0){
        valueAxis.syncWithAxis = chart.yAxes.getIndex(0);
    }
    
    var series = chart.series.push(new am4charts.LineSeries());
    series.dataFields.valueY = field;
    series.dataFields.dateX = "date";
    series.strokeWidth = 2;
    series.yAxis = valueAxis;
    series.name = name;
    series.tooltipText = "{name}: [bold]{valueY}[/]";
    series.tensionX = 0.8;
    series.showOnInit = true;
    
    var interfaceColors = new am4core.InterfaceColorSet();
    
    switch(bullet) {
        case "triangle":
        var bullet = series.bullets.push(new am4charts.Bullet());
        bullet.width = 12;
        bullet.height = 12;
        bullet.horizontalCenter = "middle";
        bullet.verticalCenter = "middle";

        var bullethover = bullet.states.create("hover");
        bullethover.properties.scale = 1.5;
        
        var triangle = bullet.createChild(am4core.Triangle);
        triangle.stroke = interfaceColors.getFor("background");
        triangle.strokeWidth = 2;
        triangle.direction = "top";
        triangle.width = 12;
        triangle.height = 12;

        var bullethover2 = triangle.states.create("hover");
        bullethover2.properties.scale = 1.5;
        break;

        default:
        var bullet = series.bullets.push(new am4charts.CircleBullet());
        bullet.circle.stroke = interfaceColors.getFor("background");
        bullet.circle.strokeWidth = 2;

        var bullethover = bullet.states.create("hover");
        bullethover.properties.scale = 1.5;
        break;
    }
    
    valueAxis.renderer.line.strokeOpacity = 1;
    valueAxis.renderer.line.strokeWidth = 2;
    valueAxis.renderer.line.stroke = series.stroke;
    valueAxis.renderer.labels.template.fill = series.stroke;
    valueAxis.renderer.opposite = opposite;
    }

    createAxisAndSeries("readiness", "Readiness", true, "circle");
    createAxisAndSeries("pNN50", "pNN50 (%)", true, "triangle");

    // Add legend
    chart.legend = new am4charts.Legend();

    // Add cursor
    chart.cursor = new am4charts.XYCursor();

    }); // end am4core.ready()
});
</script>