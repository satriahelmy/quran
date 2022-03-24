@include('elements/header')
@include('elements/sidebar')

<style>
 audio{
 max-height: 100%;
 max-width: 100%;
 margin: auto;
 object-fit: contain;
 }
</style>

<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quran
            <small>Detail Surat</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Surat</a></li>
            <li class="active">Detail Surat</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Surat</h3>
            </div>
            <div class="box-body">
                <table id="main-grid" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th>Ayat</th>
                            <th>Bacaan</th>
                            <th>Dengarkan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($surat->verses as $row)
                        <tr>
                            <td><?php echo $row->number->inSurah; ?></td>
                            <td><h3><?php echo $row->text->arab; ?></h3>
                                <br/><?php echo $row->translation->id; ?>
                            </td>
                            <td>
                                <audio controls>
                                  <source src="<?php echo $row->audio->secondary[0];?>" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        oTable = $('#main-grid').DataTable({
            responsive:true
        }
        );   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
        
        $('#pilih').each(function(){
          oTable.search($(this).val()).draw() ;
        });
    });
</script>

@include('elements/footer')
