using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using TMPro;

public class GameManager : MonoBehaviour
{
    public int gameTime = 99;
    public int score = 0;
    public GameObject EndScreen;
    

    public TextMeshProUGUI gameTimeText;
    public TextMeshProUGUI endGameScore;
    public TextMeshProUGUI scoreText;
    public TextMeshProUGUI endGameComment;
    
    void Start()
    {
        Time.timeScale = 1.0f;
        scoreText.text = score.ToString();
        gameTimeText.text = gameTime.ToString();
        InvokeRepeating("CountDown", 1.0f, 1.0f);
    }

    public void gameover(string death_message){
        endGameComment.text = death_message;
        Pause();
        EndScreen.gameObject.SetActive(true);
    }


    public void AddScore(int s)
    {
        score += s;
        scoreText.text = score.ToString();
        endGameScore.text = score.ToString();

    }

    public void restartGame()
    {
        EndScreen.gameObject.SetActive(false);
        SceneManager.LoadScene("Game");
    }

    public void CountDown(){
        if(gameTime > 0){
            gameTime --;
        }
        else{
            gameover("Time is up!");
        }
        gameTimeText.text = gameTime.ToString();
    }

    public void Pause()
    {
        Time.timeScale = 0f;
    }
}
