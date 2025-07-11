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
?>


<div class="row">

    <table class="table table bordered">
        <tr>
            <td colspan="2" class="col">
                현재 위치 : ㅌㅌㅌㅌㅌㅌㅌㅌㅌㅌ
            </td>
        </tr>
        <tr>
            <td class="col-3">
                디렉토리 .. <br>
                <table class="table">
                <?php
                    $dirs = getDirs("./");
                    $cnt = 0;
                    while(isset($dirs[$cnt]))
                    {
                        $nextDir = "/" . $dirs[$cnt];
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
                        $files = getFiles("./");
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

        <tr>
            <td colspan="2" class="col">
                <textarea name="cccc" class="form-control" rows="5"></textarea>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="col">
                <div class="row">
                    <div class="col-3 colLine">파일명</div>
                    <div class="col colLine">
                        <input type="text" name="fname" class="form-control" placeholder="파일명을 입력하세요">
                    </div>
                    <div class="col-2 colLine">
                        <button type="submit" class="btn btn-primary">등록</button>
                    </div>
                </div>
            </td>            
        </tr>

    </table>

</div>
<div class="row">
    <div class="col colLine">
        
    </div>
</div>