<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="responseMessage" class="hidden p-4 rounded-lg"></div>
                <form id="feedbackForm">
                    @csrf
                    <div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4">
                            <div>
                                <label for="name" class="block text-gray-700">Name</label>
                                <input type="text" id="name" name="name" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Razor">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
                                    placeholder="razor@gmail.com">
                            </div>
                            <div>
                                <label for="message" class="block text-gray-700">Message</label>
                                <textarea type="text" id="message" name="message" rows="5" cols="33"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" placeholder="Got anythin' to say?"></textarea>
                            </div>
                        </div>
                        <div class="mt-4 text-end pe-2 py-2">
                            <button type="submit" id="submitFeedback"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <span id="submitText">Submit Feedback</span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('feedbackForm').addEventListener('submit', async function(e) {
            e.preventDefault();

            const submitFeedback = document.getElementById('submitFeedback');
            const submitButton = document.getElementById('submitText');
            // const spinnah = document.getElementById('spinnah');
            const responseMessage = document.getElementById('responseMessage');

            submitFeedback.disabled = true;
            submitButton.textContent = 'Sending...';
            // spinnah.classList.remove('hidden');
            responseMessage.classList.add('hidden');

            const payload = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                message: document.getElementById('message').value
            };

            try {
                const response = await fetch('https://hook.eu2.make.com/hc01ahkq5ef1ikofgdn3yc98i9ydj7fc', {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(payload)
                });

                const data = await response.text();
                alert("Successfully sent feedback!");
                responseMessage.classList.remove('hidden');

            } catch (error) {
                responseMessage.className = 'p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg';
                responseMessage.textContent = `Error: ${error.message}`;
                console.error('Submission error: ', error);
            } finally {
                submitFeedback.disabled = false;
                submitButton.textContent = 'Send Feedback';

                if (responseMessage.classList.contains('hidden' === false)) {
                    setTimeout(() => {
                        responseMessage.classList.add('hidden');
                    }, 5000);
                }
            }
        })
    </script>
</x-app-layout>
