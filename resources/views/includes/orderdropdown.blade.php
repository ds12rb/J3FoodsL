<div id="orderdropdown{{$id}}" class="collapse width">
    <div class="row"> <!-- start of row -->
      @foreach($completeorders as $currentitem)
      {{-- */$optionselection = '';/* --}}
      @if($currentitem->order_id==$id)
        @if($currentitem->option_id)
          {{-- */$option = $currentitem->item->option->name;/* --}}
          @if($currentitem->choice)
            {{-- */$choices=explode(',',$currentitem->choice);/* --}}
            @foreach($choices as $choice)
              @if($currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first())
                @if(empty($optionselection))
                  {{-- */$optionselection = $currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first()->name;/* --}}
                @else
                  {{-- */$optionselection = $optionselection.", ".$currentitem->item->option->choices->where('option_id',$currentitem->option_id)->where('choice_id',(int)$choice)->first()->name;/* --}}
                @endif
              @else
                @if(empty($optionselection))
                  {{-- */$optionselection = $choice;/* --}}
                @else
                  {{-- */$optionselection = $optionselection.", ".$choice;/* --}}
                @endif
              @endif
            @endforeach
          @else
            {{-- */$optionselection = 'No Selection';/* --}}
        @endif
      @else
        {{-- */$option = 'No Additional Options';/* --}}
        {{-- */$optionselection = 'No Selection';/* --}}
      @endif
      <div class="list-group">
        <div class="col-sm-3 menu-items">
            <a href="#" class="list-group-item">
              <h4 class="list-group-item-heading">{{$currentitem->item->name}}</h4>
              <p class="list-group-item-text">
              {{$option}}<br />
              {{$optionselection}}</p>
            </a>
        </div>
      </div>
      @endif
      @endforeach
    </div> <!-- end of row -->
</div><!-- main div -->