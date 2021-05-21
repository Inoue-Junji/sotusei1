
  <!--空ページのつもり-->
<!--  <!DOCTYPE html>-->
<!--<html lang='ja'>-->
<!--    <head>-->
<!--        <meta charset='utf-8'>-->
<!--        <meta name='viewport' content='user-scalable=no,width=device-width,initial-scale=1'>-->
<!--        <title>個人記録</title>-->
        
        <!--<script src='script.js'></script>-->
<!--    </head>-->
<!--    <body>-->
        <!--<div class='allControl'>-->
        <!--<div style="margin:0px;padding:0px;" align="center">-->
        <!--    <table border="1" width="500" height="1000">-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <th bgcolor="darkgray">1-1</th>-->
        <!--            <th bgcolor="darkgray">1-2</th>-->
        <!--            <th bgcolor="darkgray">1-3</th>-->
        <!--            <th bgcolor="darkgray">1-4</th>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>2-1</td>-->
        <!--            <td>2-2</td>-->
        <!--            <td>2-3</td>-->
        <!--            <td>2-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>3-1</td>-->
        <!--            <td>3-2</td>-->
        <!--            <td>3-3</td>-->
        <!--            <td>3-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>4-1</td>-->
        <!--            <td>4-2</td>-->
        <!--            <td>4-3</td>-->
        <!--            <td>4-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>5-1</td>-->
        <!--            <td>5-2</td>-->
        <!--            <td>5-3</td>-->
        <!--            <td>5-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>6-1</td>-->
        <!--            <td>6-2</td>-->
        <!--            <td>6-3</td>-->
        <!--            <td>6-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>7-1</td>-->
        <!--            <td>7-2</td>-->
        <!--            <td>7-3</td>-->
        <!--            <td>7-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>8-1</td>-->
        <!--            <td>8-2</td>-->
        <!--            <td>8-3</td>-->
        <!--            <td>8-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>9-1</td>-->
        <!--            <td>9-2</td>-->
        <!--            <td>9-3</td>-->
        <!--            <td>9-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>10-1</td>-->
        <!--            <td>10-2</td>-->
        <!--            <td>10-3</td>-->
        <!--            <td>10-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>11-1</td>-->
        <!--            <td>11-2</td>-->
        <!--            <td>11-3</td>-->
        <!--            <td>11-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>12-1</td>-->
        <!--            <td>12-2</td>-->
        <!--            <td>12-3</td>-->
        <!--            <td>12-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>13-1</td>-->
        <!--            <td>13-2</td>-->
        <!--            <td>13-3</td>-->
        <!--            <td>13-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>14-1</td>-->
        <!--            <td>14-2</td>-->
        <!--            <td>14-3</td>-->
        <!--            <td>14-4</td>-->
        <!--        </tr>-->
        <!--        <tr align="center" bgcolor="darkgray">-->
        <!--            <td>15-1</td>-->
        <!--            <td>15-2</td>-->
        <!--            <td>15-3</td>-->
        <!--            <td>15-4</td>-->
        <!--        </tr>-->
        <!--    </table>-->
        <!--</div>-->

        <!--<div class='allControl'>-->
        <!--    <button id='allReset'>ALL RESET</button>-->
        <!--    <button id='export'>TEXT</button>-->
        <!--    <button id='allStop'>ALL STOP</button>-->
        <!--    <button id='allStart'>ALL START</button>-->
        <!--    <button id='hold'>HOLD</button>-->
        <!--    <select id='resolution'>-->
        <!--        <option value='0'>1</option>-->
        <!--        <option value='1'>1/10</option>-->
        <!--        <option value='2' selected>1/100</option>-->
        <!--        <option value='3'>1/1000</option>-->
        <!--    </select>-->
        <!--    <button id='numOfDay'>Day.Hour</button>-->
        <!--</div>-->
        <!--<div id='container'>-->
        <!--</div>-->
        <!--<div class='exportModal'>-->
        <!--    <button class='close'>x</button>-->
        <!--    <textarea class='text'></textarea>-->
<!--        </div>-->
        <!--<script src={{ asset('/js/individual.js') }}></script>-->
<!--    </body>-->
<!--</html>-->


<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('個人記録') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <table class="text-center w-full border-collapse">
            <thead>
              <tr>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">選手名</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">距離</th>
                <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-lg text-grey-dark border-b border-grey-light">タイム</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($runners as $runner)
              <tr class="hover:bg-grey-lighter">
                <td class="py-4 px-6 border-b border-grey-light">
                  
                  
                  
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>