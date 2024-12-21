<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corememories";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "
    SELECT 
        ip.islandOfPersonalityID,
        ip.name AS islandName,
        ip.shortDescription,
        ip.color,
        ic.image,
        ic.content
    FROM 
        islandsofpersonality ip
    LEFT JOIN 
        islandcontents ic ON ip.islandOfPersonalityID = ic.islandOfPersonalityID
";


$result = $conn->query($sql);


$islands = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (!isset($islands[$row['islandOfPersonalityID']])) {
            $islands[$row['islandOfPersonalityID']] = [
                'name' => $row['islandName'],
                'description' => $row['shortDescription'],
                'color' => $row['color'],
                'contents' => []
            ];
        }
        $islands[$row['islandOfPersonalityID']]['contents'][] = [
            'image' => $row['image'],
            'content' => $row['content']
        ];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Island of Personalities</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        header {
            position: relative;
            text-align: center;
            color: white;
        }

        header .w3-image {
            width: 100%;
            height: auto;
            filter: brightness(50%);
        }

        header .header-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        header .header-content h1 {
            font-size: 3rem;
            margin: 0;
        }

        header .header-content h3 {
            font-size: 1.5rem;
            font-weight: lighter;
        }

        .w3-card-4 {
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .w3-card-4:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .w3-card-4 .w3-container {
            padding: 10px;
        }

        .w3-modal-content img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>

<body>


    <header style="position: relative; text-align: center; color: white;">
        <img class="w3-image" src="img/insideout1.jpg" alt="Header Image" style="width: 100%; height: auto; filter: brightness(50%);">
        <div style="
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    border: 2px solid white;
    padding: 20px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 5px;
  ">
            <h1 style="font-size: 3rem; margin: 0;">Samantha Llarena</h1>
            <h3 style="font-size: 1.5rem; font-weight: lighter; margin: 10px 0 0;">Island of Personalities</h3>
        </div>
    </header>

    <div class="w3-content w3-padding-large w3-margin-top" id="portfolio">
        <div class="w3-row-padding">
            <?php foreach ($islands as $id => $island): ?>
                <div class="w3-col s12 m6 l3 w3-margin-bottom">
                    <div class="w3-card-4 w3-hover-shadow"
                        onclick="showIsland(<?php echo htmlspecialchars(json_encode($island)); ?>)"
                        style="background-color: <?php echo $island['color']; ?>;">
                        <img src="<?php echo $island['contents'][0]['image']; ?>" alt="<?php echo $island['name']; ?>" style="width:100%; height:200px; object-fit:cover;">
                        <div class="w3-container w3-center">
                            <h3 style="color: #fff;"><?php echo htmlspecialchars($island['name']); ?></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div id="islandModal" class="w3-modal">
        <div class="w3-modal-content w3-animate-opacity">
            <div class="w3-container" id="modalContainer">
                <span onclick="closeModal()" class="w3-button w3-display-topright w3-large w3-hover-red">&times;</span>
                <div class="w3-padding">
                    <h2 id="islandTitle"></h2>
                    <p id="islandDescription"></p>
                    <div id="islandContents"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showIsland(island) {
            document.getElementById('islandTitle').innerText = island.name;
            document.getElementById('islandDescription').innerText = island.description;

            const modalContainer = document.getElementById('modalContainer');
            modalContainer.style.backgroundColor = island.color || '#ffffff'; // Use color from the database or default to white

            const contentsDiv = document.getElementById('islandContents');
            contentsDiv.innerHTML = '';

            if (island.contents) {
                island.contents.forEach(content => {
                    const contentElement = document.createElement('div');
                    contentElement.style.marginBottom = '20px';

                    if (content.image) {
                        const img = document.createElement('img');
                        img.src = content.image;
                        img.alt = island.name;
                        img.style.borderRadius = '10px';
                        img.style.marginBottom = '10px';
                        contentElement.appendChild(img);
                    }

                    if (content.content) {
                        const paragraph = document.createElement('p');
                        paragraph.innerText = content.content;
                        contentElement.appendChild(paragraph);
                    }

                    contentsDiv.appendChild(contentElement);
                });
            }

            document.getElementById('islandModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('islandModal').style.display = 'none';
        }
    </script>

</body>

</html>