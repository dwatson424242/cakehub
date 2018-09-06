<?php
/**
 * Fancy View Example - search_element.ctp
 *
 * A CakePHP Template Compatible Search element that includes model searching and full
 * page downloads. 
 * 
 * @author      Daniel Watson <daniel@homesidekick.com> 
 * @copyright   Copyright (c), Daniel Watson
 * @license     http://danielwatson.net/
 * @link        http://danielwatson.net/
 * @version     Developed using PHP7, Tested for PHP7 
 * @filesource
 */
?>

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<style>

@font-face {
  font-family: 'Glyphicons Halflings';

  src: url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot');
  src: url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.woff') format('woff'), url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
}

.glyphicon-search:before {
    content: "\e003";
}

.input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
}
.input-group-btn {
    display: table-cell;
}

button, html input[type=button], input[type=reset], input[type=submit] {
    -webkit-appearance: button;
    cursor: pointer;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
}

.btn-info {
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.glyphicon {
    position: relative;
    top: 1px;
    display: inline-block;
    font-family: 'Glyphicons Halflings';
    font-style: normal;
    font-weight: 400;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}


#page_search {
  width: 250px;
  float: left;
  margin-right: 10px;
}

#download-page {
  float:right;
}

span.input-group-btn {
  width:150px;
  float:left;
}

#filter-row {
  background: #b8d1d4;
}

</style>

<?= $this->Form->create('Search', ['type'=>'get', 'id'=>'search-form']) ?>

  <div class="row">
    <div class="col-sm-5 col-md-5">


            <div class="searchbar">


                <?php
                $search = '';
                $qs = '';
                foreach($this->request->query as $key => $val) {
                 if($key == 'search') {
                     $search = $this->request->query['search'];
                 } else {
                     $qs .= '<input type="hidden" name="'.$key.'" value="'.$val.'" />';
                 }
                }
                ?>
                <div id="custom-search-input">
                 <div class="input-group col-md-12">
                     <input id="page_search" type="text" class="form-control input-lg"  name="search" value="<?= $search ?>"placeholder="Search" />
                     <span class="input-group-btn">
                        <?= $this->Form->button(__('<i class="glyphicon glyphicon-search"></i>'), ['class'=>'btn btn-info btn-lg green']) ?>
                        
                        <input class="btn btn-default " type="button" value="Clear" onClick="document.getElementById('page_search').value='';this.form.submit();" />
                     </span>

                 </div>
                </div>


            </div>


    </div> 
    <div class="col-sm-7 col-md-7 input-group">

<?php
$download_params = [
  '_ext'=>'csv',
  '?' => (!empty($this->request->params['?'])) ? $this->request->params['?'] : ''
];


?>

    <?php echo $this->Html->link("Download This Page", $download_params, ['id'=>'download-page']); ?>


    </div> 

  </div>
  <div class="row">
    <div class="col-sm-12 col-md-12">

<?php 

    if(!empty($filters) && count($filters)>0) {

      $c = floor(12 / count($filters));
      ?>
          <div class='row' id="filter-row">
      <?php

      foreach($filters as $filter) {

        $val = '';
        if(!empty($this->request->query[$filter['name']])) {
          $val = $this->request->query[$filter['name']];
        }

        echo "<div class=\"pull-left col-sm-".$c." col-md-".$c." input-group\">";
        echo $this->Form->select($filter['name'], $filter['options'], ['empty' => $filter['empty'], 'value'=>$val, 'onChange'=>'this.form.submit()', 'class'=>'form-control']);
        echo "</div>";
      } 

      echo "</div>";
    }
?>

    </div> 

  </div>


<?= $this->Form->end() ?>













