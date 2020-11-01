$(document).ready(function(){
    // login / sign up form aimations
    $("#signup_btn").click(function(){
        $("#main").animate({left:"22.5%"},400); 
        $("#main").animate({left:"30%"},500); 
        $("#loginform").css("visibility","hidden");
        $("#loginform").animate({left:"25%"},400);
        
        $("#signupform").animate({left:"17%"},400);
        $("#signupform").animate({left:"30%"},500);
        $("#signupform").css("visibility","visible");
    }); 
    
    $("#login_btn").click(function(){
        $("#main").animate({left:"77.5%"},400); 
        $("#main").animate({left:"70%"},500);
        $("#signupform").css("visibility","hidden");
        $("#signupform").animate({left:"75%"},400);
        
        $("#loginform").animate({left:"83.5%"},400);
        $("#loginform").animate({left:"70%"},500);
        $("#loginform").css("visibility","visible");
    });

    //login validation
    $('#log-btn').click(function() {
        if ($.trim($("#log-user").val()) === "" || $.trim($("#log-pass").val()) === "") {
            alert('you did not fill out one of the fields');
            return false;
        }
    });
    //register validation
    $('#reg-btn').click(function() {
        if ($.trim($("#reg-user").val()) === "" || $.trim($("#reg-pass").val()) === "") {
            alert('you did not fill out one of the fields');
            return false;
        }
    });
    //doctor validation
    $('#doc-btn').click(function() {
        if ($.trim($("#doc-name").val()) === "" || $.trim($("#doc-phone").val()) === "") {
            alert('you did not fill out one of the fields');
            return false;
        }
    });
    //patient validation
    $('#pat-btn').click(function() {
        if ($.trim($("#pat-name").val()) === "" || $.trim($("#pat-phone").val()) === "" || $.trim($("#pat-mail").val()) === "" || $.trim($("#pat-med").val()) === "") {
            alert('you did not fill out one of the fields');
            return false;
        }
    });
    //appointment validation
    $('#app-btn').click(function() {
        if ($.trim($("#app-date").val()) === "") {
            alert('you did not fill out one of the fields');
            return false;
        }
    });

    //show doctors and hide the rest
    $('#doctors').click(function(){
        $('.doc-data').removeClass("visible");
        $('.pat-data').addClass("visible");
        $('.apt-data').addClass("visible");
    });
    //show patients hide the rest
    $('#patients').click(function(){
        $('.pat-data').removeClass("visible");
        $('.doc-data').addClass("visible");
        $('.apt-data').addClass("visible");
    });
    //show appointments hide the rest
    $('#appointments').click(function(){
        $('.apt-data').removeClass("visible");
        $('.pat-data').addClass("visible");
        $('.doc-data').addClass("visible");
    });

    // $("#navigation a").on("click", function(e){
    //     e.preventDefault();
    //     var currTab = $(this).data("tab"),
    //         bodyClassName = "bg-" + currTab.replace(/#/, "");
    //     localStorage.setItem("currentTab", currTab);
    //     localStorage.setItem("bodyClassName", bodyClassName);
    //     $(".panel").hide();
    //     $(currTab).fadeIn();
  
    //     document.body.className = bodyClassName;
    //   });
  
    //   var lastSelectedTab = localStorage.getItem("currentTab"),
    //       lastBodyClassName = localStorage.getItem("bodyClassName");
  
    //   if (!lastSelectedTab) {
    //     lastSelectedTab = "#home";
    //     lastBodyClassName = "bg-home"
    //   }
    //   $(lastSelectedTab).fadeIn();
    //   document.body.className = lastBodyClassName;


    //Saing the class with visble to cookies so it doesnt reset after a refresh
    // var cookies = document.cookie.split(';')
    // .reduce((res, c) => {
    // const [key, val] = c.trim().split('=').map(decodeURIComponent)
    // return Object.assign(res, {
    //   [key]: val
    // })
    // }, {});
    // console.log(cookies);

    
    // $(function() {
    // if (cookies.doc-data === "inactive")
    //     $(".div2").addClass("active");
    // $(".div1").click(function(e) {
    //     e.stopPropagation();
    //     $(".div2").addClass("active");
    //     document.cookie = "div2=inactive"
    // });


    // });

});







