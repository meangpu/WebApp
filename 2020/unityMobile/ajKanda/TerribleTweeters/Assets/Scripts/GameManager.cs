using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using TMPro;
using UnityEngine.SceneManagement;

public class GameManager : MonoBehaviour
{
    public GameObject[] allMonster;
    public int monsterLeft;
    public TextMeshProUGUI TextLevel;

    void Start()
    {
        allMonster = GameObject.FindGameObjectsWithTag("Monster");
        monsterLeft = allMonster.Length;
        TextLevel.text = SceneManager.GetActiveScene().name;
    }

    public void updateEnemyLeft()
    {
        allMonster = GameObject.FindGameObjectsWithTag("Monster");
        monsterLeft = allMonster.Length;
    }

    public void checkFinishLevel()
    {
        updateEnemyLeft();
        if (monsterLeft <= 0)
        {
            GameObject.Find("levelControl").GetComponent<LevelController>().GoToNextLevel();
        }
    }
}
