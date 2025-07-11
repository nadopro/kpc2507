<?php
   function getDirs($path)
    {
        $dirHandler = opendir($path);
        while(($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                $files[] = $filename;
            }
        }

        return $files;
    }

    function getFiles($path)
    {
        $dirHandler = opendir($path);
        while(($filename = readdir($dirHandler)) != false)
        {
            if(is_dir("$path/$filename"))
            {
                
            }else
            {
                $files[] = $filename;
            }

        }

        return $files;
    }

    function readFileSecure($path)
    {
        if(!$handler = fopen($path, "r"))
        {
            return "File Open Error";
        }

        $fileContents = file_get_contents($path, true);
        return $fileContents;
    }

    if(!isset($_SESSION['sess_dir']))
    {
        $_SESSION['sess_dir'] = "./";
    }

    if(isset($_GET['pdir']))
    {
        $_SESSION['sess_dir'] = $_GET['pdir'];
    }

    if(isset($_POST['fdata']) and isset($_POST['fname']))
    {
        $fname = $_POST['fname'];
        $fdata = $_POST['fdata'];

        echo "fname = $fname, fdata = $fdata <br>";
        $pathFile = $_SESSION['sess_dir'] . "/" . $fname;

        if(file_exists($pathFile))
        {
            unlink("$pathFile");
        }

        if(!$handler = fopen($pathFile, "w"))
        {
            echo "File Open Error for Write";
        }

        if(fwrite($handler, $fdata) == false)
        {
            echo "File Write Error";
        }

        echo "
        <script>
            alert('파일 생성 완료 : $fname');
            location.href='index.php?cmd=ftp';
        </script>
        ";
    }
?>


<div class="row">

    <table class="table table bordered">
        <tr>
            <td colspan="2" class="col">
                <a href='index.php?cmd=ftp&pdir=./'>처음으로</a><br>
                현재 위치 : <?php echo $_SESSION['sess_dir'] ?>
            </td>
        </tr>
        <tr>
            <td class="col-3">
                디렉토리 .. <br>
                <table class="table">
                <?php
                    $dirs = getDirs($_SESSION['sess_dir']);
                    $cnt = 0;
                    while(isset($dirs[$cnt]))
                    {
                        $nextDir = $_SESSION['sess_dir'] ."/" . $dirs[$cnt];
                        echo "
                        <tr>
                            <td>
                                <a href='index.php?cmd=ftp&pdir=$nextDir'>$dirs[$cnt]</a>
                            </td>
                        </tr>
                        ";
                        $cnt ++;
                    }
                ?>
                </table>
            </td>
            <td class="col">
                파일
                <table class="table">
                    <?php
                        $files = getFiles($_SESSION['sess_dir']);
                        $cnt = 0;

                        while(isset($files[$cnt]))
                        {
                            echo "
                            <tr>
                                <td>
                                    <a href='index.php?cmd=ftp&pfile=$files[$cnt]'>$files[$cnt]</a>
                                </td>
                            </tr>
                            ";
                            $cnt ++;
                        }
                    ?>
                </table>
            </td>
        </tr>

        <?php
            if(isset($_GET['pfile']))
            {
                $fileContents = readFileSecure("./" . $_GET['pfile']);
            }else
            {
                $fileContents = "";
            }
        ?>



        <form method="post" action="index.php?cmd=ftp">
        <tr>
            <td colspan="2" class="col">
                <textarea name="fdata" class="form-control" rows="5"><?php echo $fileContents?></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="col">
                <div class="row">
                    <div class="col-3 colLine">파일명</div>
                    <div class="col colLine">
                        <input type="text" name="fname" class="form-control"  placeholder="파일명을 입력하세요">
                    </div>
                    <div class="col-2 colLine">
                        <button type="submit" class="btn btn-primary">등록</button>
                    </div>
                </div>
            </td>            
        </tr>
        </form>

    </table>

</div>
<div class="row">
    <div class="col colLine">
        
    </div>
</div>