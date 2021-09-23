@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
   <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">             
			
			  <script type="text/javascript">
					(function (v,i){
						var source = 'https://s.vi-serve.com/source.js',
							config = {
								ChannelID: '59d5e5f928a0613dee2beeff',
								AdUnitType: '1',
								PublisherID: '852642858208935',
								PlacementID: '852642858208935',
								DivID: '12345678',
								IAB_Category: 'IAB1',
								Keywords: 'Dreamploy',
								Language: 'en-us',
								BG_Color: '',
								Text_Color: '',
								Font: '',
								FontSize: '',
								vioptional1: '',
								vioptional2: '',
								vioptional3: '',
							},
							o=i.frameElement && config.DivID && !v.getElementById(config.DivID) && i.parent.document.getElementById(config.DivID),
							w=o?i.parent:i,
							b=o?i.parent.document.body:v.body||v.documentElement.appendChild(v.createElement('body')),scr=v.createElement('script');
						scr.src=source,
						scr.async=!0,scr.onload=function(){w.vi.run(config,void 0===v.currentScript?v.scripts[v.scripts.length-1]:v.currentScript,source)},b.appendChild(scr);
					})(document,window)</script>                   		
				
          
			<script type="text/javascript" src="https://viral782.com/track.html?js=53755"></script>
        </div>
       </div>
     </div>
   <br>
		
@endsection
@section('script')
<script>
function myJSCallBack(status) {
   if (status == "SUCCESS") {
       console.log("SUCCESS from publisherscript")
       // TODO Handle ad available (Option)
   } else if (status == "ERROR") {
       console.log("ERROR from publisherscript")
       // TODO Handle ad not available
   }
};
</script>
@endsection