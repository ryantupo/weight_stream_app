@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Data</h1>
        <ul>
            @foreach ($data as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gym Barbell Lying on Its Side</title>
        <style>
            /* Barbell Container */
            .barbell {
                position: relative;
                width: 300px;
                height: 50px;
                background-color: #ccc;
                border-radius: 10px;
                margin: 50px auto;
            }

            /* Barbell Ends */
            .barbell::before,
            .barbell::after {
                content: "";
                position: absolute;
                width: 10px;
                height: 100%;
                background-color: #333;
                border-radius: 5px;
                top: 0;
            }

            .barbell::before {
                left: 0;
            }

            .barbell::after {
                right: 0;
            }

            /* Barbell Bar */
            .bar {
                position: absolute;
                top: 50%;
                left: 395px;
                transform: translate(-50%, -50%);
                width: 200px;
                height: 20px;
                background-color: #333;
                border-radius: 5px;
            }

            /* Barbell Weights */
            .weight {
                position: absolute;
                border-radius: 5px;
                top: 50%;
                min-height: 5
                left: 94%;
                transform: translate(-50%, -50%);
            }

            /* Button Container */
            .buttons {
                margin-top: 125px;
            }

            /* Weight Buttons */
            .weight-button {
                margin-right: 10px;
            }
        </style>
    </head>

    <body>
        <div class="barbell">
            <div class="bar"></div>
            <!-- Weight divs and plates will be added dynamically here -->
        </div>

        <div class="buttons">
            <button class="weight-button" data-color="#ff0000" data-weight="25" data-width="20" data-height="250">Add 25kg Plate</button>
            <button class="weight-button" data-color="#0000ff" data-weight="20" data-width="18" data-height="225">Add 20kg Plate</button>
            <button class="weight-button" data-color="#ffff00" data-weight="15" data-width="16" data-height="200">Add 15kg Plate</button>
            <button class="weight-button" data-color="#00ff00" data-weight="10" data-width="14" data-height="175">Add 10kg Plate</button>
            <button class="weight-button" data-color="#ffffff" data-weight="5" data-width="12" data-height="150">Add 5kg Plate</button>
            <button class="weight-button" data-color="#000000" data-weight="2.5" data-width="10" data-height="125">Add 2.5kg Plate</button>
            <button class="weight-button" data-color="#c0c0c0" data-weight="1.25" data-width="8" data-height="100">Add 1.25kg Plate</button>
            <button class="weight-button" data-color="#c0c0c0" data-weight="0.75" data-width="6" data-height="75">Add 0.75kg Plate</button>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                const addButton = document.querySelectorAll(".weight-button");
                const barbell = document.querySelector(".barbell");

                addButton.forEach(button => {
                    button.addEventListener("click", function () {
                        const color = this.getAttribute("data-color");
                        const weight = this.getAttribute("data-weight");
                        const width = this.getAttribute("data-width");
                        const height = this.getAttribute("data-height");

                        const weightDiv = document.createElement("div");
                        weightDiv.classList.add("weight");
                        weightDiv.style.backgroundColor = color;

                        // Set the width based on data-width attribute
                        weightDiv.style.width = `${width}px`;
                        weightDiv.style.height = `${height}px`;

                        // Find the last weight div and calculate the left position for the new weight
                        const existingWeights = document.querySelectorAll(".weight");
                        if (existingWeights.length > 0) {
                            const lastWeight = existingWeights[existingWeights.length - 1];
                            const lastWeightLeft = parseFloat(lastWeight.style.left);
                            const newPosition = lastWeightLeft - 7;
                            weightDiv.style.left = `${newPosition}%`;
                        } else {
                            // If it's the first weight, position it at the right end
                            weightDiv.style.left = "94%";
                        }

                        barbell.appendChild(weightDiv);
                    });
                });
            });
        </script>
    </body>

    </html>
@endsection
