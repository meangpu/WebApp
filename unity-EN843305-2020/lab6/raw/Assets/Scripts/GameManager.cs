using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using TMPro;

public class GameManager : MonoBehaviour
{
    public int score;
    public int gameTime;
    public TextMeshProUGUI text_score;
    public TextMeshProUGUI text_timer;
    public GameObject[] fruits;
    // public GameObject fruit;

    public GameObject Left;
    public GameObject Right;

    public string[] fruitWave;
    int waveState = 0;
    int waveCount = 0;

    float width;
    float height;

    void Start() {
        updateTime();
        updateScore();

        height = Camera.main.orthographicSize * 2.0f;
        width = height * Screen.width / Screen.height;

        Left.transform.position = new Vector2(-width/2, 0);
        Right.transform.position = new Vector2(width/2, 0);

        InvokeRepeating("DecreaseTime", 1.0f, 1.0f);
        // InvokeRepeating("SpawnFruit", 1.0f, 2.0f);
        InvokeRepeating("SpawnFruitWave", 1.0f, 2.0f);
    }

    public void updateScore(){
        text_score.text = "score: " + score.ToString();
    }

    public void updateTime(){
        text_timer.text = gameTime.ToString();
    }

    void DecreaseTime(){
        gameTime --;
        if (gameTime <= 0){
            CancelInvoke("DecreaseTime");
        }
        updateTime();
    }

    void SpawnFruit(){
        int fruitRandomId = Random.Range(0, fruits.Length);
        Vector2 position = new Vector2(Random.Range(-width/2, width/2), height/2);
        Instantiate(fruits[fruitRandomId], position, Quaternion.identity);
    }
    
    void SpawnFruitWave(){
        int fruitRandomId = Random.Range(0, fruits.Length);
        // random fruit id to spawn

        if (waveCount > fruitWave[waveState].Length - 1){
            // happen when one item in list finish it will go to next one
            waveCount = 0;
            waveState++;
            if (waveState > fruitWave.Length - 1){
                // happen when all item in list finished
                CancelInvoke("SpawnFruitWave");
                return;
            }
        }

        int fruitPosition = int.Parse(fruitWave[waveState][waveCount].ToString());
        Vector2 position = new Vector2(-width/2 + (width/10f)*fruitPosition, height/2);
        Instantiate(fruits[fruitRandomId], position, Quaternion.identity);
        Debug.Log("create fruit id: " + fruitRandomId + "/ at: " + position);
        Debug.Log("current number: " + fruitWave[waveState][waveCount]);
        waveCount++;


        // will run through all number in list 


    }



}
