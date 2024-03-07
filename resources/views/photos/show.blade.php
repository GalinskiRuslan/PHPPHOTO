@extends('layout.base')


@section('content')
    <x-card>
        <div>
            <h1>Photo</h1> <button>Редактировать фото</button><x-form name="deletePhoto"
                action="{{ route('photos.destroy', ['photo' => $photo]) }}" method="DELETE"></x-form>
        </div>
        <img alt=photo src="/storage/photos/{{ $photo }}" style="width: 100%" />

    </x-card>
@endSection


<script>
    function deletePhoto() {

        axios.delete('{{ route('photos.destroy', $photo) }}', {
            photo: "{{ $photo }}"

        })
    }
</script>
