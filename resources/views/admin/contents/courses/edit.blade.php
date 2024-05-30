@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>Edit Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item active">Edit Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/courses/update/{{ $courses->id }}" method="post" class="mt-3">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $courses->name ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Math" {{ $courses->category == 'Math' ? 'selected' : '' }}>Math</option>
                            <option value="English" {{ $courses->category == 'English' ? 'selected' : '' }}>English</option>
                            <option value="Marketing" {{ $courses->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                            <option value="Bussines" {{ $courses->category == 'Bussines' ? 'selected' : '' }}>Bussines</option>
                            <option value="Computer" {{ $courses->category == 'Computer' ? 'selected' : '' }}>Computer</option>
                            <option value="Cooking" {{ $courses->category == 'Cooking' ? 'selected' : '' }}>Cooking</option>
                            <option value="Music" {{ $courses->category == 'Music' ? 'selected' : '' }}>Music</option>
                            <option value="Art" {{ $courses->category == 'Art' ? 'selected' : '' }}>Art</option>
                            <option value="Photography" {{ $courses->category == 'Photography' ? 'selected' : '' }}>Photography</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label for="class" class="form-label">Desc</label>
                        <input type="text" name="desc" id="desc" class="form-control"
                            value="{{ $courses->class ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
