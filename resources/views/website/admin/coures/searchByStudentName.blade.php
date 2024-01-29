@foreach($data as $student)
    <div data-id="{{ $student->id }}" onclick="getmyid(this)"
         class="studentId cursor-pointer w-full flex  py-3  justify-between border-b px-5  rounded-lg hover:bg-orange/20 border-black/10">
        <p class=" text-md text-start font-bold text-black34">
            {{ $student->firstName }}
        </p>
        <p class=" text-md text-start  text-black34">
            {{ $student->phone }}
        </p>
    </div>
@endforeach
