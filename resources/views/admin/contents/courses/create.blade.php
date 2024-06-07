@extends('admin.main')
@section('content')
    <div class="pagetitle">
        <h1>+ Courses</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item active">+ Courses</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="/admin/courses/store" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ $courses->name ?? '' }}">
                    </div>

                    <div class="mb-2">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                            <option value="">Pilih Kategori</option>
                            <option value="Pemasaran Digital">Pemasaran Digital</option>
                            <option value="Bahasa">Bahasa</option>
                            <option value="Keuangan">Keuangan</option>
                            <option value="Bussines">Bussines</option>
                            <option value="Computer">Computer</option>
                            <option value="Cooking">Cooking</option>
                            <option value="Music">Music</option>
                            <option value="Art">Art</option>
                            <option value="Kecantikan">Kecantikan</option>
                            <option value="Photography">Photography</option>
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
                </table>
            </div>
        </div>
    </section>
@endsection
