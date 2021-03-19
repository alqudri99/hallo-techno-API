<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.containerr {
  position: relative;
  width: 10%;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.containerr:hover .image {
  opacity: 0.3;
}

.containerr:hover .middle {
  opacity: 1;
}

.text {
  background-color: #ff6767;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
</head>
<body>

<h2>Opacity with Box</h2>
<p>Hover over the image to see the effect.</p>

<div class="containerr">
    <div class="gallery">
          <img class="image" src="http://127.0.0.1:8000/images/7uo0xbfJj5E6rL0sSOmDn0IBSijYKc.jpg" alt="Mountains" width="600" height="400">
        
      </div>
    <div class="middle">
      <a target="_blank" href="img_mountains.jpg">
        <div class="text">Hapus</div>
      </a>
    </div>
  </div>
  
</body>
</html>
