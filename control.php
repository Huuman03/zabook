<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('connect.php');
    class datadoan{
        public function insertda($user,$pass,$add,$avt,$gender,$hobby)
        {
            global $conn;
            $sql="insert into taikhoan(taikhoan,matkhau,sdt,ngaysinh,gioitinh)
            values('$user','$pass','$add','$avt','$gender')";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function selectda()
        {
            global $conn;
            $sql=" select * from taikhoan";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        

        public function id($id)
        {
            global $conn;
            $sql="select * from taikhoan where id='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function upavat($avat,$id)
        {
            global $conn;
            $sql="update taikhoan set avatar='$avat' where id='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function datten($avat,$id)
        {
            global $conn;
            $sql="update taikhoan set ten='$avat' where id='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        
        public function updateda($avat,$ava,$av,$a,$avat1,$ten,$id)
        {
            global $conn;
            $sql="update taikhoan set taikhoan='$avat',matkhau='$ava',
            sdt='$av',ngaysinh='$a',gioitinh='$avat1',ten='$ten' where id='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        public function deleteda($xoa)
        {
            global $conn;
            $sql="delete from taikhoan where id='$xoa'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        public function insertbv($avat,$ava,$id,$time)
        {
            global $conn;
            $sql="insert into baiviet(idtk,noidung,baiviet,time)
            values('$avat','$ava','$id','$time')";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        public function idbv($id)
        {
            global $conn;
            $sql="select * from baiviet where idbv='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        public function selectbv()
        {
            global $conn;
            $sql="select * from baiviet order by idbv desc";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
        public function deletebv($xoa)
        {
            global $conn;
            $sql="delete from baiviet where idbv='$xoa'";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function selecttn()
        {
            global $conn;
            $sql="select * from inbox order by idtn asc";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function guitn($user,$pass,$add)
        {
            global $conn;
            $sql="insert into inbox(ndtn,idng,idnn)
            values('$user','$pass','$add')";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function deletetn($xoa)
        {
            global $conn;
            $sql="delete from inbox where idtn='$xoa' ";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function insertbl($avat,$ava,$id,$time)
        {
            global $conn;
            $sql="insert into binhluan(idbv,idng,ndbl,timebl)
            values('$avat','$ava','$id','$time')";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function selectbl($idbv)
        {  
            global $conn;
            $sql="select * from binhluan where idbv=$idbv";
            $sql="select * from binhluan order by idbl asc";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }

        public function deletebl($xoa)
        {
            global $conn;
            $sql="delete from binhluan where idbv='$xoa' ";
            $run=mysqli_query($conn,$sql);
            return $run;
            
        }
    }
    

    ?>
    
</body>
</html>