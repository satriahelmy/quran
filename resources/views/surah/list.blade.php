@include('elements/header')
@include('elements/sidebar')

<link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Quran
            <small>Daftar Surat</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Surat</a></li>
            <li class="active">Daftar Surat</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Daftar Surat</h3>
            </div>
            <div class="box-body">
                <table id="main-grid" class="table table-bordered table-striped table-responsive">
                    <thead>
                        <tr>
                            <th width="10%">No Surat.</th>
                            <th width="30%">Surat</th>
                            <th width="20%">Diturunkan</th>
                            <th width="20%">Jumlah Ayat</th>
                            <th width="20%">Baca</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($surat as $row)
                        <tr>
                            <td><?php echo $row->number; ?></td>
                            <td><?php echo $row->name->transliteration->id; ?></td>
                            <td><?php echo $row->revelation->id; ?></td>
                            <td><?php echo $row->numberOfVerses; ?></td>
                            <td>
                                <a href="<?php echo url('surah'); ?>/<?php echo $row->number; ?>" class="btn btn-primary">BACA</a>
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
