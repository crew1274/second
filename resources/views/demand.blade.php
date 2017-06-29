@extends ('layouts.dashboard')
@push('css')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css"/>
@endpush
@section('title','需量反應設定')
@section('page_heading','需量反應設定')
@section('section')
    <div class="col-sm-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        {!! Form::open(['url' => 'demand']) !!}
        {{ csrf_field() }}
        <div class="row">
                <div class="col-sm-8">
                    @section ('typo1_panel_title','需量值設定:')
                    @section ('typo1_panel_body')
    <label class="text-muted">最大需量值設定(KW):</label>
     {!! Form::number('value', $last -> value, array('id' => 'max','readonly' => 'true','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                        <br>
        <div id="demand-max" ></div>
        <br>
                        <label class="text-muted">需量低限(%):</label>
                        {!! Form::number('value_min', $last -> value_min, array('id' => 'demand_bottom','readonly' => 'true','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                     <br><label class="text-muted">需量高限(%):</label>
                        {!! Form::number('value_max', $last -> value_max, array('id' => 'demand_top','readonly' => 'true','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                        <br>
                        
        <div id="demand-range"></div>  
<br>

                </div>
        </div>
        @endsection
        @include('widgets.panel', array('header'=>true, 'as'=>'typo1'))
        <div class="row">
            <div class="col-sm-8">
                @section ('typo2_panel_title','卸載模式設定:')
                @section ('typo2_panel_body')
                    <div class="form-group">
                        <label class="text-muted">卸載模式:</label>
                        {!! Form::select('mode', [ '先卸一起復歸' => '先卸一起復歸',
                                                 '先卸先復歸' => '先卸先復歸',
                                                 '先卸後復歸' => '先卸後復歸',
                                                 '循環先卸一起復歸' => '循環先卸一起復歸',
                                                 '循環先卸先復歸' => '循環先卸先復歸',
                                                 '循環先卸後復歸' => '循環先卸後復歸'], $last ->mode, array('class' => 'form-control')) !!}
                    </div>
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'typo2'))
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                @section ('typo3_panel_title','需量控制時間設定:')
                @section ('typo3_panel_body')
                    <label class="text-muted">卸載間隔時間:</label>
                    {!! Form::number('load_off_gap', $last ->load_off_gap, array('id' => 'gap1','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                    <label class="text-muted">秒</label>
                    <br><br>
                    <label class="text-muted">復歸延遲時間:</label>
                    {!! Form::number('reload_delay', $last ->reload_delay, array('id' => 'delay','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                    <label class="text-muted">秒</label>
                    <br> <br>
                    <label class="text-muted">復歸間隔時間:</label>
                    {!! Form::number('reload_gap', $last ->reload_gap, array('id' => 'gap2','class' => 'form-control','style'=>'border:0;  font-weight:bold;')) !!}
                    <label class="text-muted">秒</label>
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'typo3'))
    </div>
    </div>
                <div class="row">
                    <div class="col-sm-8">
                @section ('typo4_panel_title','卸載群種類設定:')
                @section ('typo4_panel_body')
                            <div class="form-group">
                                <label class="text-muted">卸載群種類:</label>
                                {!! Form::select('group', [ '模組常開' => '模組常開',
                                                 '模組常關' => '模組常關',
                                                 '不設定' => '不設定',
                                                 'DEM電表系列' => 'DEM電表系列'], $last->group, array('class' => 'form-control')) !!}
                            </div>
                @endsection
                @include('widgets.panel', array('header'=>true, 'as'=>'typo4'))
                        </div>
                </div>

                  <div class="row">
                  <div class="col-sm-8">
                  @section ('typo5_panel_title','需量計算週期設定:')
                   @section ('typo5_panel_body')
                    <div class="form-group">
                    <label class="text-muted">週期(分):</label>
                     {!! Form::select('cycle', [ '15' => '15',
                                                '30' => '30',
                                               '60' => '60'], $last->cycle, array( 'class' => 'form-control')) !!}
                     </div>
                       @endsection
                       @include('widgets.panel', array('header'=>true, 'as'=>'typo5'))

                        <div class="row">
                            <div class="col-sm-8">
                        <button type="test" class="btn btn-primary">更新</button>
                            </div>
                        </div>
            </fieldset>
        </form>
    </div>  
@stop
@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script>
        $( function() {
            $( "#demand-range" ).slider({
                range: true,
                min: 0,
                max: 100,
                step: 5,
                values: [ {!! $last->value_min or 0!!}, {!! $last->value_max or 0 !!} ],
                slide: function( event, ui )
				{
			 	$( "#demand_bottom" ).val( ui.values[ 0 ]);
			 	$( "#demand_top" ).val( ui.values[ 1 ]);
                }
            });
            $( "#demand_bottom" ).val( $( "#demand-range" ).slider( "values",0 ));
            $( "#demand_top" ).val( $( "#demand-range" ).slider( "values",1 ) );
        } );
	</script>

	<script>
        $( function() {
            $( "#demand-max" ).slider({
                range: "min",
                min: 100,
                max: 1000,
                step: 10,
                value: {!! $last->value or 0 !!},

                slide: function( event, ui ) {
                    $( "#max" ).val( ui.value );
                }
            });
            $( "#max" ).val( $( "#demand-max" ).slider( "value" ) );
        } );
	</script>

	<script>
        $( function() {
            var spinner = $( "#gap1" ).spinner();
        } );
	</script>

	<script>
        $( function() {
            var spinner = $( "#delay" ).spinner();
        } );
	</script>

	<script>
        $( function() {
            var spinner = $( "#gap2" ).spinner();
        } );
	</script>
@endpush
