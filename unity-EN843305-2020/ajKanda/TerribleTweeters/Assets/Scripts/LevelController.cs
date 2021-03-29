using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class LevelController : MonoBehaviour
{

    [SerializeField] string _nextLevelName;

    GameObject[] _monsters;
    
    public void GoToNextLevel()
    {
        SceneManager.LoadScene(_nextLevelName);
    }

}
