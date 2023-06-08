<?php
session_start();
$count = 0;
$name = $_SESSION["email"];
if (!isset($_SESSION["email"])) {
  header("Location:login.php");
} else {
  $count++;
}
?><html>

<head>
    <title>Bookings Reports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-  Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    </link>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.2.3/jspdf.plugin.autotable.js"></script>
    <style>
   table {
        width: 90%;
        table-layout: fixed;
        max-width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        box-shadow: 0 2px 15px rgba(64, 64, 64, .7);
        border-radius: 12px 12px 0 0;
        margin: 50px auto;
        word-wrap: break-word; 
    }
    
        button
    {
        white-space: normal !important;
        word-break:break-all;
        margin: auto;
    }
    </style>
</head>

<body id="target">
    <?
			include "./adminHeader.php";
			include "./sidebar.php";
			?>
    <div>
        <h2 class="h2">Bookings Report</h2>
    </div>

    <div class="row my-3 mx-5">
        <div class="col-sm-3  mx-5">
            <select class="custom-select" id="month">
                <option selected value="0">1 Year</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-sm-3  mx-5">
            <button type="button" id="btn_download" class="btn btn-secondary px-5"><i
                    class="fa fa-download "></i></button>
        </div>
    </div>




    <div id="customers">
        <table id="reportbookingtable">
            <thead>
                <th class="text-center">Ceilo Paradise Travels</th>
                <th class="text-center">Bookings Report</th>
                <th class="text-center" id="m"></th>
            </thead>
            <thead>
                <th class="text-center">Booking ID</th>
                <th class="text-center">Customer</th>
                <th class="text-center">Address</th>
                <th class="text-center">Vehicle No </th>
                <th class="text-center">Category </th>
                <th class="text-center">Booked Date</th>
                <th class="text-center">Returned Date</th>
                <th class="text-center">Total</th>
            </thead>
            <tbody id="tbody2"> </tbody>
        </table>
    </div>


    <script type="module">
    var tbody = document.getElementById('tbody2');

    ///
    $(function() {
        $("#month").change(function() {
            GetAllDataRealtime();
        });
    });

    ////

    var rlist = [];

    function AddItemToTable(index, email, address, vehicle, category, bookedDate, endDate, amount) {
        var oNo = 0;
        let row = document.createElement('tr');
        let td0 = document.createElement('td');
        let td1 = document.createElement('td');
        let td2 = document.createElement('td');
        let td3 = document.createElement('td');
        let td4 = document.createElement('td');
        let td5 = document.createElement('td');
        let td6 = document.createElement('td');
        let td7 = document.createElement('td');

        rlist.push([email, address, vehicle, category, bookedDate, endDate, amount]);
        td0.innerHTML = index + 1;
        td1.innerHTML = email;
        td2.innerHTML = address;
        td3.innerHTML = vehicle;
        td4.innerHTML = category;
        td5.innerHTML = bookedDate;
        td6.innerHTML = endDate;
        td7.innerHTML = amount;

        row.appendChild(td0);
        row.appendChild(td1);
        row.appendChild(td2);
        row.appendChild(td3);
        row.appendChild(td4);
        row.appendChild(td5);
        row.appendChild(td6);
        row.appendChild(td7);
        tbody.appendChild(row);
    }

    var vNo = 0;

    function AddAllItemsToTable(bookings) {
        tbody.innerHTML = "";
        bookings.forEach((element, index) => {
            AddItemToTable(index, element.email, element.address, element.vehicle, element.category, element
                .bookedDate, element.endDate, element.amount);
        });
    }



    // Initialize Firebase
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
    import {
        getFirestore,
        addDoc,
        getDocs,
        onSnapshot,
        collection,
        setDoc,
        where,
        query
    } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-firestore.js";

    const firebaseConfig = {
        apiKey: "AIzaSyCRuqAbV-e21DW5DmqVHaHMSf-Nedvh1kY",
        authDomain: "ppaapp-5d413.firebaseapp.com",
        projectId: "ppaapp-5d413",
        storageBucket: "ppaapp-5d413.appspot.com",
        messagingSenderId: "415052255713",
        appId: "1:415052255713:web:20e1b4959d37d4d68d42a0",
        measurementId: "G-PYN9WRV7F9"
    };

    const app = initializeApp(firebaseConfig);
    const db = getFirestore();

    //getting data
    async function GetAllDataRealtime() {
        var bookings = [];

        //get dropdown data and convert to date
        var select = document.getElementById('month');
        var text = select.options[select.selectedIndex].value;

        if (text != 0) {
            const q = await getDocs(collection(db, "bookings"));
            q.forEach(async (docs) => {
                if (docs.data().bookedDate != null) {
                    var parts = docs.data().bookedDate.split("/");
                    var dt = new Date(parseInt(parts[2], 10), parseInt(parts[1], 10) - 1, parseInt(
                        parts[0], 10));
                    var mt = dt.getMonth() + 1;
                    var text1 = select.options[select.selectedIndex].text;
                    document.getElementById("m").innerHTML = text1;
                    if (mt == text) {
                        bookings.push(docs.data())
                        AddAllItemsToTable(bookings)
                        const v = await getDocs(collection(db, "vehicles"));
                        v.forEach((vehicle) => {
                            bookings.forEach(obj => {
                                if (vehicle.data().vehicleName == obj.vehicle) {
                                    obj.category = vehicle.data().category;
                                    obj.amount = vehicle.data().price;
                                    AddAllItemsToTable(bookings);
                                }
                            });
                        });
                    }
                }
                const qu = await getDocs(collection(db, "bookings", docs.id, "oldbookings"));
                qu.forEach(async (docs1) => {
                    if (docs1.data().email != null) {
                        var parts = docs1.data().bookedDate.split("/");
                        var dt = new Date(parseInt(parts[2], 10), parseInt(parts[1], 10) -
                            1, parseInt(parts[0], 10));
                        var mt = dt.getMonth() + 1;
                        var text1 = select.options[select.selectedIndex].text;
                        if (mt == text) {
                            bookings.push(docs1.data())
                            AddAllItemsToTable(bookings)
                            const v = await getDocs(collection(db, "vehicles"));
                            v.forEach((vehicle) => {
                                bookings.forEach(obj => {
                                    if (vehicle.data().vehicleName == obj
                                        .vehicle) {
                                        obj.category = vehicle.data()
                                            .category;
                                        obj.amount = vehicle.data().price;
                                        AddAllItemsToTable(bookings);
                                    }
                                });
                            });
                        }
                    }
                });
                if (bookings.length == 0) {
                    var text1 = select.options[select.selectedIndex].text;
                    document.getElementById("m").innerHTML = text1;
                    bookings = [];
                    AddAllItemsToTable(bookings);
                }
            });
        } else {
            var text1 = select.options[select.selectedIndex].text;
            document.getElementById("m").innerHTML = text1;
            bookings = [];

            const q = await getDocs(collection(db, "bookings"));
            q.forEach(async (docs) => {
                if (docs.data().email != null) {
                    bookings.push(docs.data())
                    AddAllItemsToTable(bookings)
                    const v = await getDocs(collection(db, "vehicles"));
                    v.forEach((vehicle) => {
                        bookings.forEach(obj => {
                            if (vehicle.data().vehicleName == obj.vehicle) {
                                obj.category = vehicle.data().category;
                                obj.amount = vehicle.data().price;
                                AddAllItemsToTable(bookings);
                            }
                        });
                    });
                }
                const qu = await getDocs(collection(db, "bookings", docs.id, "oldbookings"));
                qu.forEach(async (docs1) => {
                    if (docs1.data().email != null) {
                        bookings.push(docs1.data())
                        AddAllItemsToTable(bookings)
                        const v = await getDocs(collection(db, "vehicles"));
                        v.forEach((vehicle) => {
                            bookings.forEach(obj => {
                                if (vehicle.data().vehicleName == obj
                                    .vehicle) {
                                    obj.category = vehicle.data().category;
                                    obj.amount = vehicle.data().price;
                                    AddAllItemsToTable(bookings);
                                }
                            });
                        });
                    }
                });
            });
        }
    }

    window.onload = GetAllDataRealtime;
    </script>
    <script>
    $(document).ready(function() {
        $('#btn_download').click(function() {
            var pdf = new jsPDF('p', 'pt', 'A3');
            source = $('#reportbookingtable')[0];
            pdf.addHTML(source, function() {
                pdf.save('Bookings-report.pdf');
            });
        });
    });
    </script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>