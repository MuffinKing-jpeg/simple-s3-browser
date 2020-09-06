# simple-s3-browser

How to use?:
0. Download files and drop to your site root
1. Put in to header tag '<link rel="stylesheet" href="filemanager.css" />'.  Put in the end of <body>
  '''html
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="script.js"></script>
  '''
2. Put in to body , or any <div>
  '''html
  <div class="filemanager">
        <div class="search">
          <input type="search" placeholder="Find a file.." />
        </div>

        <div class="breadcrumbs"></div>

        <ul class="data"></ul>

        <div class="nothingfound">
          <div class="nofiles"></div>
          <span>No files here.</span>
        </div>
    '''
