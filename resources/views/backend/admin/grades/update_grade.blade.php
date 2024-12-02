<x-admin-layout>
    <div class="grade_container">
       <h1>Update Grade</h1>
   
       <div class="custom_form">
           <form action="{{ route('grade.update', ['grade' => $grade]) }}" method="post">
               @csrf
               @method('PATCH')
   
               <div class="group">
                   <div class="input_group">
                       <label for="grade_name">Grade Name</label>
                       <input type="text" name="grade_name" id="grade_name" value="{{ old('grade_name', $grade->grade_name) }}" placeholder="Eg. A">
                       <span class="inline_alert">{{ $errors->first('grade_name') }}</span>
                   </div>
   
                   <div class="input_group">
                       <label for="grade_point">Grade Points</label>
                       <input type="text" name="grade_point" id="grade_point" value="{{ old('grade_point',$grade->grade_point) }}" placeholder="A has 12 Points">
                       <span class="inline_alert">{{ $errors->first('grade_point') }}</span>
                   </div>
               </div>
   
               <div class="group">
                   <div class="input_group">
                       <label for="min_score">Minimum Score</label>
                       <input type="number" name="min_score" id="min_score" value="{{ old('min_score', $grade->min_score) }}" placeholder="Enter minimum Score">
                       <span class="inline_alert">{{ $errors->first('min_score') }}</span>
                   </div>
   
                   <div class="input_group">
                       <label for="max_score">Maximum Score</label>
                       <input type="number" name="max_score" id="max_score" value="{{ old('max_score', $grade->max_score) }}" placeholder="Enter maximum Score">
                       <span class="inline_alert">{{ $errors->first('max_score') }}</span>
                   </div>
               </div>
               <button type="submit">Update Grade</button>
           </form>
       </div>
    </div>
</x-admin-layout>