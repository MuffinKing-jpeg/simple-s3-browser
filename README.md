# simple-s3-browser

How to use?:
* Download files and drop to your site root
* Put in to header tag `<link rel="stylesheet" href="filemanager.css" />`.  Put in the end of <body>
  ```html
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="script.js"></script>
  ```
* Put in to body , or any <div>
  ```html
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
    ```
* Make you s3 bucket public and update ![CORN](https://aws.amazon.com/premiumsupport/knowledge-center/read-access-objects-s3-bucket/)
* Put in to `scan.php` url to you bucket.
