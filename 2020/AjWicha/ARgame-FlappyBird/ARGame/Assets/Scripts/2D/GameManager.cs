using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using TMPro;

[System.Serializable]
public class Character
{
    public GameObject prefeb;
    public bool is_playable;
    public bool is_select = false;
    public string char_name;
    public Sprite char_sprite;
    public GameObject char_Img_disable;
    public ParticleSystem firstGet;
    public GameObject select_Arrow; 

    public void updateSelectArrow()
    {
        if (is_select)
        {
            select_Arrow.SetActive(true);
        }
        else
        {
            select_Arrow.SetActive(false);
        }
    }

    public void playParticle()
    {
        firstGet.Play();
    }

    public void setState()
    {
        if (is_playable)
        {
            char_Img_disable.SetActive(false);
        }
        else
        {
            char_Img_disable.SetActive(true);
        }
    }

    public void unlockCharacter()
    {
        char_Img_disable.GetComponent<Animator>().SetTrigger("unlock");
        playParticle();
        is_playable = true;
    }

}



public class GameManager : MonoBehaviour
{
    public bool playing = false;
    public Character[] allPlayerInfo;
    public GameObject player;

    public GameObject pipeSpawner;
    [Header("gameover")]
    public GameObject gameOverPanel;
    public TMP_Text gameOverText;

    [Header("startPlayGame")]
    public GameObject beforeStart;
    public GameObject BackSelChar;
    public GameObject myName;
    public GameObject ui_playing;
    public GameObject in_ar_mode;

    void Start()
    {
        gameOverPanel.SetActive(false);
        Time.timeScale = 1;
        pipeSpawner.SetActive(false);
        freezePlayer();
    }


    public void selectCharacter(GameObject playerPrefab)
    {
        foreach (Character nowChar in allPlayerInfo)
        {
            nowChar.is_select = false;
            nowChar.updateSelectArrow();
            if (playerPrefab == nowChar.prefeb && nowChar.is_playable)
            {
                nowChar.is_select = true;
                player.GetComponent<SpriteRenderer>().sprite = nowChar.char_sprite;
            }
            nowChar.updateSelectArrow();
        }
    }

    public void startGame()
    {

        playing = true;
        pipeSpawner.SetActive(true);
        beforeStart.SetActive(false);
        BackSelChar.SetActive(false);
        myName.SetActive(false);
        ui_playing.SetActive(true);
        in_ar_mode.SetActive(false);

        player.GetComponent<Rigidbody2D>().gravityScale = 1;
    }

    public void freezePlayer()
    {
        player.GetComponent<Rigidbody2D>().gravityScale = 0;
    }

    public void GameOver()
    {
        gameOverText.text = Score.score.ToString();
        ui_playing.SetActive(false);
        gameOverPanel.SetActive(true);
        Time.timeScale = 0;
    }

    public void RestartGame()
    {
        SceneManager.LoadScene(0);
    }

    [ContextMenu("asdasdad")]
    public void testMeangpu()
    {
        foreach (Character nowChar in allPlayerInfo)
        {
            nowChar.updateSelectArrow();
            nowChar.unlockCharacter();
            Debug.Log(nowChar.char_name);
        }
    }


}
