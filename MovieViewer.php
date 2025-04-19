<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MovieViewer</title>
    <style>
        body{
            background-color: black;
        }
        video{
            margin: 7.5% ;
        }
    </style>
</head>
<body>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        if($id==1)
            $src="Movies\\Pirates.of.the.Caribbean.On.Stranger.Tides.2011.BluRay.720p.mp4";
        else if($id==2)
            $src="Movies\\1917.2019.BluRay.720p.mp4";
        else if($id==3)
            $src="Movies\\Rio.2011.BluRay.x264.360p.mp4";
    }
?>
    <div>
        <video src="<?php echo$src;?>"
    controls></video>
    </div>
</body>
</html>

