<?php
class FileUpload {

    private $filePath;     //ָ���ϴ��ļ������·��
    private $allowType=array('gif', 'jpg', 'png', 'jpeg', 'txt');  //�����ϴ��ļ�������
    private $maxSize=1000000;  //���ϴ��ļ�����󳤶� 1M
    private $isRandName=true;  //�Ƿ������������ true false�������ʹ��ԭ�ļ���
    private $originName;   //Դ�ļ�����
    private $tmpFileName;   //��ʱ�ļ���
    private $fileType;  //�ļ�����
    private $fileSize;  //�ļ���С
    private $newFileName; //���ļ���
    private $errorNum=0;  //�����
    private $errorMess=""; //�����ṩ���󱨸�



    //���ڶ��ϴ��ļ���ʹ��
    //1. ָ���ϴ�·���� 2����������ͣ� 3�����ƴ�С�� 4���Ƿ�ʹ������ļ�����
    //���û����Բ��ð�λ�ô����������������ֵ���ý�ǰ��������Ҳ�ṩֵ
    function __construct($options=array()){
        foreach($options as $key=>$val){
            //�鿴�û�������������±��Ƿ�ͳ�Ա��������ͬ
            if(!in_array($key,get_class_vars(get_class($this)))){
                continue;
            }
            //���ó�Ա����
            $this->setOption($key, $val);
        }
    }


    //��ô���ԭ��
    private function getError(){
        //��ô���ԭ��
        $str="�ϴ��ļ�<font color='red'>{$this->originName}</font>ʱ����";
        switch($this->errorNum){
            case 4: $str .= "û���ļ����ϴ�"; break;
            case 3: $str .= "�ļ�ֻ�������ϴ�"; break;
            case 2: $str .= "�ϴ��ļ�������HTML����MAX_FILE_SIZEѡ��ָ����ֵ"; break;
            case 1: $str .= "�ϴ��ļ�������php.ini ��upload_max_filesizeѡ���ֵ"; break;
            case -1: $str .= "�������������"; break;
            case -2: $str .= "�ļ������ϴ��ļ����ܳ���{$this->maxSize}���ֽ�"; break;
            case -3: $str .= "�ϴ�ʧ��"; break;
            case -4: $str .= "��������ϴ��ļ�Ŀ¼ʧ�ܣ�������ָ���ϴ�Ŀ¼"; break;
            case -5: $str .= "����ָ���ϴ��ļ���·��"; break;
            default: $str .=  "ĩ֪����";
        }
        return $str.'<br>';
    }


    //��������ļ��ϴ�·��
    private function checkFilePath(){
        if(empty($this->filePath)) {
            $this->setOption('errorNum', -5);
            return false;
        }
        if(!file_exists($this->filePath) || !is_writable($this->filePath)){
            if(!@mkdir($this->filePath, 0755)){
                $this->setOption('errorNum', -4);
                return false;
            }
        }
        return true;
    }

    //��������ļ��ϴ��Ĵ�С
    private function checkFileSize() {
        if($this->fileSize > $this->maxSize){
            $this->setOPtion('errorNum', '-2');
            return false;
        }else{
            return true;
        }
    }

    //���ڼ���ļ��ϴ�����
    private function checkFileType() {
        if(in_array(strtolower($this->fileType), $this->allowType)) {
            return true;
        }else{
            $this->setOption('errorNum', -1);
            return false;
        }
    }

    //�����ϴ�����ļ�����
    private function setNewFileName(){
        if($this->isRandName){
            $this->setOption('newFileName', $this->proRandName());
        } else {
            $this->setOption('newFileName', $this->originName);
        }
    }


    //��������ļ�����
    private function proRandName(){
        $fileName=date("YmdHis").rand(100,999);
        return $fileName.'.'.$this->fileType;
    }

    //���ó�Ա����
    private function setOption($key, $val){
        $this->$key=$val;
    }

    //�����ϴ�һ���ļ�
    function uploadFile($fileField){
        //Ĭ�Ϸ���ֵΪTrue
        $return=true;
        //���ȼ���ļ��ϴ�·��
        if(!$this->checkFilePath()){
            $this->errorMess=$this->getError();
            return false;
        }

        //����ϴ��ļ�������
        $name=$_FILES[$fileField]['name'];
        //�����ʱ�ļ���
        $tmp_name=$_FILES[$fileField]['tmp_name'];
        //����ϴ��ļ��Ĵ�С
        $size=$_FILES[$fileField]['size'];
        //����ϴ��������
        $error=$_FILES[$fileField]['error'];

        //����ϴ����Ƕ���ļ�
        if(is_Array($name)){
            //������ű���Ҳ��Array����Ϊһ���ļ���Ӧһ���������
            $errors=array();
            //��������ļ�
            for($i=0; $i<count($name); $i++){
                if($this->setFiles($name[$i], $tmp_name[$i], $size[$i], $error[$i])){
                    if(!$this->checkFileSize() || !$this->checkFileType()){
                        $errors[]=$this->getError();
                        $return=false;
                    }
                }else{
                    $error[]=$this->getError();
                    $return=false;
                }
                if(!$return)
                    $this->setFiles();
            }
            if($return){
                $fileNames=array();
                for($i=0; $i<count($name); $i++){
                    if($this->setFiles($name[$i], $tmp_name[$i], $size[$i], $error[$i])){
                        $this->setNewFileName();
                        if(!$this->copyFile()){
                            $errors=$this->getError();
                            $return=false;
                        }else{
                            $fileNames[]=$this->newFileName;
                        }
                    }
                }
                //��һ������
                $this->newFileName=$fileNames;
            }
            //��ֵ������Ϣ
            $this->errorMess=$errors;
            return $return;
            //����ǵ����ļ��ϴ�
        } else {
            if($this->setFiles($name, $tmp_name, $size, $error)){
                if($this->checkFileSize() && $this->checkFileType()){
                    $this->setNewFileName();
                    if($this->copyFile()){
                        return true;
                    }else{
                        $return=false;
                    }
                }else{
                    $return=false;
                }
            }else{
                $return=false;
            }

            if(!$return)
                $this->errorMess=$this->getError();


            return $return;
        }
    }

    //�����ļ�,���ļ�����ʱ·���ƶ�����·��
    private function copyFile(){
        if(!$this->errorNum){
            $filePath=rtrim($this->filePath, '/').'/';
            $filePath.=$this->newFileName;

            if(@move_uploaded_file($this->tmpFileName, $filePath))	{
                return true;
            }else{
                $this->setOption('errorNum', -3);
                return false;
            }

        }else{
            return false;
        }
    }

    //���ú�$_FILES�йص�����
    private function setFiles($name="", $tmp_name='', $size=0, $error=0){

        $this->setOption('errorNum', $error);
        if($error){
            return false;
        }
        $this->setOption('originName', $name);
        $this->setOption('tmpFileName', $tmp_name);
        //�ָ��ļ�����ȡ���һ����׺
        $arrStr=explode('.', $name);
        $this->setOption('fileType', strtolower($arrStr[count($arrStr)-1]));
        $this->setOption('fileSize', $size);
        return true;
    }

    //���ڻ�ȡ�ϴ����ļ����ļ���
    function getNewFileName(){
        return $this->newFileName;
    }

    //�ϴ����ʧ�ܣ����������������Ϳ��Բ鿴���󱨸�
    function getErrorMsg() {
        return $this->errorMess;
    }

}
//ʵ�����������
$up=new FileUpload(array('isRandName'=>false,'allowType'=>array('txt'),'filePath'=>'./', 'maxSize'=>200000,'isRandName'=>false));
echo '<pre>';
//�����ϴ��ļ��ķ���
if($up->uploadFile('file')){
    print_r($up->getNewFileName());
}else{
    print_r($up->getErrorMsg());
}
echo '</pre>';