<?php include_once('../../private/initialize.php'); 
      include('../../vendor/autoload.php');
      ?>
     <?php include(SHARED_PATH . '/header.php'); ?>

<h1>Mountains</h1>
<div class="prose">
    <h2>Build a table</h2>
    <p class="mb-0">An HTML table is built with the following tag structure:</p>
    <code class="mt-0">
        <pre>
       <?php      
echo htmlspecialchars('
    <table>
      <tr>
        <th>name</th>
        <th>height</th>
        <th>place</th>
      </tr>
      <tr>
        <td>Kilimanjaro</td>
        <td>5895</td>
        <td>Tanzania</td>
        </tr>
    </table>'
        );?>
        </pre>
    </code>
</div>

<div id="mountains"></div>

<script>
    const MOUNTAINS = [{
        name: "Kilimanjaro",
        height: 5895,
        place: "Tanzania"
    },
    {
            name: "Everest",
            height: 8848,
            place: "Nepal"
        },
        {
            name: "Mount Fuji",
            height: 3776,
            place: "Japan"
        },
        {
            name: "Vaalserberg",
            height: 323,
            place: "Netherlands"
        },
        {
            name: "Denali",
            height: 6168,
            place: "United States"
        },
        {
            name: "Popocatepetl",
            height: 5465,
            place: "Mexico"
        },
        {
            name: "Mont Blanc",
            height: 4808,
            place: "Italy/France"
        }
    ];

    // Your code here
    const table = document.createElement("table");
    const tableData = document.createElement("td");
    const mountains = document.getElementById("mountains");
    
    mountains.appendChild(table);

    
    MOUNTAINS.forEach(mountain => {
        const row = document.createElement("tr");
        table.appendChild(row);
        Object.keys(mountain).forEach(key => {
            const tableHead = document.createElement("th");
            tableHead.innerHTML = key;
            row.appendChild(tableHead);
        })
        const tableData = table.appendChild(document.createElement('tr'));
        Object.values(mountain).forEach(value => {
            const data = tableData.appendChild(document.createElement("td"));
            data.innerHTML = value;
        })
    });

    table.style["text-align"] = "right";
</script>
       <?php include(SHARED_PATH . '/footer.php'); ?>