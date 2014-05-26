$(document).ready(function () {
    //Event handler for clicking next button
    $("#submittestdata").click(function (e) {
        //Selecting Each radio button
        all_answered = false;
        $(".testForm input:radio").each(function () {
            var name = $(this).attr("name");
            //Checking whether radio button is selected and based on selection setting variable to true or false
            if ($(".testForm input:radio[name=" + name + "]:checked").length == 0) {
                all_answered = true;
            } 
        });
        //Show the error message to user if all questions are not answered
        if (all_answered == true) {
             e.preventDefault();//Put it here
            alert('You need to select answers for all questions');
        }
     });

    //check biasing of students of one to many reports ...
    $(".showGenericReport .checkBiasingEntry .checkBiasing").click(function(){
        $(".showGenericReport .manyReport .answerData span").each(function(){
            var resultData = $(this).attr('class');
             if(resultData==4) {
                $(this).addClass("addBorderToFakeRed");
            }

            if (resultData==1) {
                $(this).addClass("addBorderToFakeYellow");
            }
        });
    });

    //check biasing of students of average reports ...
    $(".checkBiasing").click(function(){
        $(".cross_results table tbody tr td").each(function(){
            var resultData = $(this).attr('class');
            if(resultData==4) {
                $(this).addClass("addBorderToFakeRed");
            }

            if (resultData==1) {
                $(this).addClass("addBorderToFakeYellow");
            }
        });
    });


    $(".printRepo").click(function () {
        var link = "<link href='../css/style.css' rel=\'stylesheet\' type=\'text/css\'/>";
        var divContents = $(".teacher_panel .cross_results").html();
        var printWindow = window.open('', '', 'height=700,width=1200');
        printWindow.document.write('<html><head><title>Print Report</title>');
        printWindow.document.write(link);
        printWindow.document.write('</head><body class=styelPrintDocument >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        $("bodyClass").css({
            "background":"yellow"
        });
    });

  /*  $(".OneManyRepo").click(function () {
        var link = "<link href='../css/style.css' rel=\'stylesheet\' type=\'text/css\'/>";
        var divContents = $(".teacher_panel .showGenericReport").html();
        var printWindow = window.open('', '', 'height=700,width=1200');
        printWindow.document.write('<html><head><title>Print Report</title>');
        printWindow.document.write(link);
        printWindow.document.write('</head><body class=styelPrintDocument >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
        $("bodyClass").css({
            "background":"yellow"
        });
    });*/

    
});


