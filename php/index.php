<?php
include_once("../user/user.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css"/>
<link rel="stylesheet" href="../css/normalize.css" />
<link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $("#example").DataTable({
                 
          columns: [
            { title: "firstname" },
            { title: "lastname" },
            { title: "gender" },
            { title: "age" },
            { title: "email" },
            { title: "address" },
          ],         
        });

        let ajax = new XMLHttpRequest();
        let method = "GET";
        let url = "data.php";
        let asynchronous = true;
        ajax.open(method,url,asynchronous);
        ajax.send();
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200) {
            let data = JSON.parse(this.responseText);           
            createTable(data);
            sessionStorage.setItem("data", JSON.stringify(data));
            }
        }        
        function createTable(data) {
            let html = "";
           for (let i = 0; i < data.length; i++){
            let firstname = data[i].first_name;
            let lastname = data[i].last_name;
            let gender = data[i].gender;
            let age = data[i].age;
            let email = data[i].email;
            let address = data[i].address;
            let id = data[i].emp_id;
           
            //appending
            html += "<tr>";
            html +="<td>" + firstname + "</td>";
            html +="<td>" + lastname + "</td>";
            html +="<td>" + gender + "</td>";
            html +="<td>" + age + "</td>";
            html +="<td>" + email + "</td>";
            html +="<td>" + address + "</td>";
            html +="<td>" + "<a href='edit.php?emp="+ id +"' class='btn'>edit</a>" + "</td>";
            html +="<td>" + "<a href='delete.php?emp="+ id +"' class='btn btn-red'>delete</a>" + "</td>";
            html +="<td>" + "<a href='view.php?emp="+ id +"' class='btn'>view</a>" + "</td>";
            html += "</tr>";
           let tBody = document.querySelector("tbody").innerHTML = html;
                
           }   
        }
      });
      function sendMailPopup() {
            let data = sessionStorage.getItem("data");
            data = JSON.parse(data);

            let html = "";
            for (let i = 0; i < data.length; i++){console.log(data)
                let firstname = data[i].first_name;
                let lastname = data[i].last_name;
                let gender = data[i].gender;
                let age = data[i].age;
                let email = data[i].email;
                let address = data[i].address;
                let id = data[i].emp_id;
            
                //appending
                html += "<tr>";
                html +="<td>" + firstname + "</td>";
                html +="<td>" + lastname + "</td>";
                html +="<td>" + gender + "</td>";
                html +="<td>" + age + "</td>";
                html +="<td>" + email + "</td>";
                html +="<td>" + address + "</td>";
                html += "</tr>";
                let tBody = document.querySelector("#ajax-rec").innerHTML = html;
                     
            } 
        }     
    </script>
</head>
<body>
<div class="container">
<div class="log__out">
<a href="add.php" class="btn">Add</a>
<button class="btn" id="pop_card" onclick="sendMailPopup()">sendmail</button>
<a href="logout.php" class="btn btn-red">logout</a>
</div>
<table id="example" class="display" width="100%"></table>
<div class="pop__up" id="pop_window">
    <form>
    <div>
    <p class="send-mail">Enter email address</p>
    <input type="email" class="mail-share" placeholder="E-mail" required>
    </div>
    <table class="pop-table">
        <thead class="small-head">
            <tr>
                <th>firstname</th>
                <th>lastname</th>
                <th>gender</th>
                <th>age</th>
                <th>email</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody id="ajax-rec">
            
        </tbody>
    </table>
    <div class="button-send">
        <input type="submit" class="btn" name="Send" value="Send">
               <a href="index.php" class="btn btn-red">Cancel</a>
    </div>
    </form>
</div>
</div>
<script>
 let pop = document.getElementById("pop_card");
      let popWind = document.getElementById("pop_window");
        pop.addEventListener("click",function(){
        popWind.style.display = "block";
      });     
</script>
</body>
</html>