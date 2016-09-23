<?php

 class GerarAtributos {

         public $titulo;
         public $descricao;
         public $googlecat;
         public $tipoproduto;
         public $material;
         public $cate;
         public $gcat;
         public $gdesc;

         //Gerar Título do produto, recebe nome e categorias
         public function GerarTitulo($nomep,$caids){


                $rnc = $this->NomeCateg($caids,1);
                //Verifica se tem nome personlizado para categoria, caso contrário retorna falso
                if($rnc){
                        $this->titulo = $rnc." ".$nomep;
                }else
                {
                        $this->titulo = $nomep;
                }
                 return $this->titulo;
         }
         public function GerarDescricao($nomp,$caids){

                 $rnc = $this->NomeCateg($caids,3,$nomp);
                 $this->descricao = $rnc;
                 return $this->descricao;
         }
         public function GerarGoogleCat($idp){
                 $this->googlecat = $this->NomeCateg($idp,2);
                 return $this->googlecat;
         }
         public function GerarTipoProduto($idp){

                 $rnc = $this->NomeCateg($idp,1);
                 if($rnc){
                        $this->tipoproduto = $rnc;
                }else
                {
                        $this->tipoproduto = "Decoração de Parede";
                }
                 return $this->tipoproduto;
         }

         public function NomeCateg ($idc,$op,$nome = ""){
            foreach($idc as $categoryId) {
switch($categoryId){
                        case 3:
                        $cate = "Adesivo de Parede ";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                        case 9:
                        $cate = "Adesivo de Parede Natureza";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                        case 114:
                        $cate = "Adesivo de Porta ";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                        case 114:
                        $cate = "Adesivo de Parede ";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                        case 11:
                        $cate = "Adesivo de Parede ";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                        case 112:
                        $cate = "Adesivo de Parede ";
                        $gcat = 3221;
                        $gdesc = "O ".$cate." ".$nome."  é uma ótima opção para modernizar sua casa ou deixá-la mais a sua cara. Decore com adesivo de parede, tudo em até 6x sem juros e frete grátis. Espatula para aplicação Grátis !";
                        break;
                         }

                if(isset($gcat) or isset($gdesc)){
                        break;
                }

                }
                if($op == 1){
                        return $cate;
                }
                else if($op == 2){
                        return $gcat;
                }else if($op == 3){
                        return $gdesc;
                }


         }


 }


?>

