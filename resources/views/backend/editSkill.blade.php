@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card shadow mb-4" style="border: 2px solid #007bff;">
                            <div class="card-header" style="background-color: #007bff; color: white;">
                                <strong class="card-title">Skills</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POST" action="{{ route('update.skill') }}" novalidate>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $skills->id }}" id="">

                                    <div class="form-group mb-3">
                                        <label for="skills-input">Technical Skills</label>
                                        <input type="text" value="{{ $skills->skill }}" data-role="tagsinput" name="skill"  class="form-control text-center"  required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="soft-skills-input">Soft Skills</label>
                                        <input type="text" value="{{ $skills->soft_skill }}" data-role="tagsinput" name="soft_skill"  class="form-control text-center"  required>
                                    </div>

                                    <button class="btn btn-success text-dark mt-3 col-md-2" type="submit">Update</button>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->
@endsection

<style>
    /* Skills Input Field */
    #skills-input,
    #soft-skills-input {
        border: 2px solid #007bff;
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
        color: #495057;
    }

    #skills-input::placeholder,
    #soft-skills-input::placeholder {
        color: #6c757d;
        opacity: 0.7;
    }

    /* Tag Labels Styling */
    .tag {
        background-color: #007bff;
        color: #ffffff;
        border-radius: 15px;
        margin: 4px;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
    }

    /* Close Button for Tag */
    .tag .close-btn {
        margin-left: 8px;
        color: #ffffff;
        font-weight: bold;
        cursor: pointer;
        font-size: 12px;
    }

    .tag .close-btn:hover {
        color: #ff0000;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const skillsInput = document.getElementById('skills-input');
        const softSkillsInput = document.getElementById('soft-skills-input');
        const tagsContainer = document.createElement('div');
        tagsContainer.classList.add('tags-container');
        skillsInput.parentNode.insertBefore(tagsContainer, skillsInput.nextSibling);

        const softTagsContainer = document.createElement('div');
        softTagsContainer.classList.add('tags-container');
        softSkillsInput.parentNode.insertBefore(softTagsContainer, softSkillsInput.nextSibling);

        // Function to add tag with close button
        function addTag(tag, container) {
            const existingTags = Array.from(container.children).map(tag => tag.textContent.slice(0, -1)); // Get existing tags
            if (existingTags.includes(tag)) {
                return; // Prevent adding duplicate tag
            }

            const tagElement = document.createElement('span');
            tagElement.classList.add('tag');
            tagElement.textContent = tag;

            const closeButton = document.createElement('span');
            closeButton.classList.add('close-btn');
            closeButton.textContent = 'x';

            closeButton.addEventListener('click', function () {
                tagElement.remove();
                updateInputValue(container);
            });

            tagElement.appendChild(closeButton);
            container.appendChild(tagElement);
            updateInputValue(container); // Update input value when a tag is added
        }

        // Function to update input value from tags
        function updateInputValue(container) {
            const tags = Array.from(container.children).map(tag => tag.textContent.slice(0, -1)); // Remove the close button text
            if (container === tagsContainer) {
                skillsInput.value = tags.join(','); // Update input field with comma-separated values
            } else {
                softSkillsInput.value = tags.join(','); // Update soft skills input field
            }
        }

        // Listen for Enter key to add new tags
        skillsInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && skillsInput.value.trim() !== '') {
                e.preventDefault();
                addTag(skillsInput.value.trim(), tagsContainer);
                skillsInput.value = ''; // Clear input
            }
        });

        softSkillsInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter' && softSkillsInput.value.trim() !== '') {
                e.preventDefault();
                addTag(softSkillsInput.value.trim(), softTagsContainer);
                softSkillsInput.value = ''; // Clear input
            }
        });

        // If there are existing skills, add them as tags
        if (skillsInput.value) {
            const existingSkills = skillsInput.value.split(',');
            existingSkills.forEach(skill => {
                if (skill.trim()) {
                    addTag(skill.trim(), tagsContainer);
                }
            });
        }

        // If there are existing soft skills, add them as tags
        if (softSkillsInput.value) {
            const existingSoftSkills = softSkillsInput.value.split(',');
            existingSoftSkills.forEach(skill => {
                if (skill.trim()) {
                    addTag(skill.trim(), softTagsContainer);
                }
            });
        }
    });
</script>