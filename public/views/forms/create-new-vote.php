<?php
require_once APP_ROOT . '/public/layout/Header.php'; ?>

<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2> <?php echo $form_title ?> </h2>

            <form id="voteForm" method="post" action="/store-vote">
                <div class="form-floating mb-3">
                    <input type="text" required class="form-control" id="title" placeholder="Title of the survey">
                    <label for="title">Title of the survey</label>
                </div>

                <p>Status of the survey</p>
                <div class="mb-3">
                <select class="form-select" id="status" name="status" aria-label="Default select example">
                    <option selected value="1">Public</option>
                    <option value="2">Draft</option>
                </select>
                </div>

                <div id="questions" class="form-floating mb-3">
                    <!-- adding the questions -->
                </div>

                <button type="button" id="addQuestionBtn" class="btn btn-primary">Add question</button><br><br>
                <button type="submit" class="btn btn-success ">Submit</button>
            </form>

            <script>
                let questionCount = 0;

                document.getElementById('addQuestionBtn').addEventListener('click', () => {
                    questionCount++;

                    // Create container for the question
                    const questionContainer = document.createElement('div');
                    questionContainer.className = 'form-floating mb-3';
                    questionContainer.dataset.questionId = `question_${questionCount}`;

                    // Label for the question
                    const questionLabel = document.createElement('label');
                    questionLabel.setAttribute('for' , `question_${questionCount}`);
                    questionLabel.textContent = `Question ${questionCount}`;
                    questionLabel.placeholder = `Question ${questionCount}`;

                    // Input for the question title
                    const questionInput = document.createElement('input');
                    questionInput.type = 'text';
                    questionInput.required = true;
                    questionInput.className = 'form-control';
                    questionInput.id = `question_${questionCount}`;
                    questionInput.name = `questions[${questionCount}][text]`;

                    // Add button "Add answer"
                    const addAnswerBtn = document.createElement('button');
                    addAnswerBtn.type = 'button';
                    addAnswerBtn.textContent = 'Add answer';
                    addAnswerBtn.className = 'btn btn-warning mb-3';
                    addAnswerBtn.addEventListener('click', () => {
                        addAnswer(questionContainer, questionCount);
                    });

                    // Add button "Delete question"
                    const deleteQuestionBtn = document.createElement('button');
                    deleteQuestionBtn.type = 'button';
                    deleteQuestionBtn.textContent = 'Delete question';
                    deleteQuestionBtn.className = 'btn btn-danger mb-3';
                    deleteQuestionBtn.addEventListener('click', () => {
                        questionContainer.remove();
                    });

                    // Answer container
                    const answerContainer = document.createElement('div');
                    answerContainer.className = 'answer-container container-md';

                    // Append elements to question container
                    questionContainer.appendChild(questionInput);
                    questionContainer.appendChild(questionLabel);
                    questionContainer.appendChild(addAnswerBtn);
                    questionContainer.appendChild(deleteQuestionBtn);
                    questionContainer.appendChild(answerContainer);

                    // Append question container to form
                    document.getElementById('questions').appendChild(questionContainer);
                });

                function addAnswer(questionContainer, questionId) {
                    const answerContainer = questionContainer.querySelector('.answer-container');
                    const answerId = `answer_${Date.now()}`;

                    // Wrap for the answer and button delete
                    const answerBlock = document.createElement('div');
                    answerBlock.className = 'answer-block';

                    // Container for answer input
                    const floatingDiv = document.createElement('div');
                    floatingDiv.className = 'form-floating mb-3';

                    // Input for the answer
                    const answerInput = document.createElement('input');
                    answerInput.type = 'text';
                    answerInput.name = `questions[${questionId}][answers][]`;
                    answerInput.required = true;
                    answerInput.className = 'form-control';
                    answerInput.id = answerId;
                    answerInput.placeholder = 'Enter the answer option';

                    // Label for the answer input
                    const answerLabel = document.createElement('label');
                    answerLabel.setAttribute('for', answerId);
                    answerLabel.textContent = 'Answer';

                    // Button to delete the answer
                    const deleteAnswerBtn = document.createElement('button');
                    deleteAnswerBtn.type = 'button';
                    deleteAnswerBtn.textContent = 'Delete answer';
                    deleteAnswerBtn.className = 'btn btn-danger mt-2 mb-3';
                    deleteAnswerBtn.addEventListener('click', () => {
                        answerBlock.remove();
                    });

                    // Append elements to the block
                    floatingDiv.appendChild(answerInput);
                    floatingDiv.appendChild(answerLabel);
                    answerBlock.appendChild(floatingDiv);
                    answerBlock.appendChild(deleteAnswerBtn);

                    // Append answer block to the container
                    answerContainer.appendChild(answerBlock);
                }


            </script>
        </div>
    </div>
</div>